@extends('layout')
@section('title')
    @parent CRM
@stop

@section('pageTitle')
    Halaman Depan
@stop

@section('content')
    <div class="row-fluid">
        <div class="metro-nav">
            <div class="metro-nav-block nav-block-red">
                <a data-original-title="" href="#">
                    <i class="icon-puzzle-piece"></i>

                    <div class="info" id="kasusopen">{{$status['open']}}</div>
                    <div class="status">Kasus Open</div>
                </a>
            </div>
            <div class="metro-nav-block nav-block-orange double">
                <a data-original-title="" href="#">
                    <i class="icon-tags"></i>

                    <div class="info" id="kasusprogress">{{$status['progress']}}</div>
                    <div class="status">Kasus dalam Proses</div>
                </a>
            </div>
            <div class="metro-nav-block nav-block-yellow">
                <a data-original-title="" href="#">
                    <i class="icon-dashboard"></i>

                    <div class="info" id="kasuspending">{{$status['pending']}}</div>
                    <div class="status">Kasus Pending</div>
                </a>
            </div>
            <div class="metro-nav-block nav-block-green double">
                <a data-original-title="" href="#">
                    <i class="icon-remove-sign"></i>

                    <div class="info" id="kasusclosed">{{$status['close']}}</div>
                    <div class="status">Kasus Terpecahkan (closed)</div>
                </a>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE widget-->
            <div class="widget red">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> Daftar Kasus</h4>
        <span class="tools">
        <!--a href="javascript:;" class="icon-chevron-down"></a>
        <a href="javascript:;" class="icon-remove"></a-->
        </span>
                </div>
                <div class="widget-body">
                    <div align="right">
                        {{HTML::link('/kasus/kirim', 'Kirim Kasus', array('class'=>'btn btn-primary'))}}
                    </div>
                    <br/>
                    <table class="table table-striped table-bordered" id="sample_1">
                        <thead>
                        <tr>
                            <th class="hidden-phone" width="10%">Ticket</th>
                            <th class="hidden-phone" width="40%">Kasus</th>
                            <th class="hidden-phone" width="14%">Waktu Kasus</th>
                            <th class="hidden-phone" width="12%">Petugas</th>
                            <th class="hidden-phone" width="8%">Status</th>
                            <th class="hidden-phone" width="8%">Prioritas</th>
                            <th class="hidden-phone" width="8%">Respon</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br/>

                    <div align="right">
                        {{HTML::link('/kasus/kirim', 'Kirim Kasus', array('class'=>'btn btn-primary'))}}
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE widget-->
        </div>
    </div>
@stop

@section('componentScript')
    {{HTML::script('template/assets/data-tables/jquery.dataTables.js')}}
    {{HTML::script('template/assets/data-tables/DT_bootstrap.js')}}
@stop

@section('pageScript')
    {{HTML::script('template/assets/data-tables/dataTables.fnReloadAjax.js')}}
    {{HTML::script('template/js/jquery.ba-dotimeout.min.js')}}
    <script type="text/javascript">
        oTable = $('#sample_1').dataTable({
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "iDisplayLength": 50,
            //"bServerSide": true,
            "sAjaxSource": "{{URL::to('kasus-ajax/kasus-all')}}",
            "sServerMethod": "POST",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [
                {'bSortable': true, 'aTargets': [0]},
                {"sType": "numeric", "aTargets": [0]}
            ],
            "aaSorting": [[0, "desc"]]
        });

        jQuery('#sample_1_wrapper .dataTables_filter input').addClass("input-medium"); // modify table search input
        jQuery('#sample_1_wrapper .dataTables_length select').addClass("input-mini"); // modify table per page dropdown

        $.ajax({
            url: "{{URL::to('kasus-ajax/kasus-alert')}}",
            type: 'POST',
        })
                .done(function (data) {
                    if (data > 0) {
                        var snd = new Audio('sound/RedAlert.wav');
                        snd.play();
                    }
                })
                .fail(function () {
                    console.log("error");
                });

        $.doTimeout(10000, function () {
            oTable.fnReloadAjax();

            $.ajax({
                url: "{{URL::to('kasus-ajax/kasus-count')}}",
                type: 'POST',
                dataType: 'json',
            })
                    .done(function (data) {
                        $('#kasusopen').html(data['open']);
                        $('#kasusprogress').html(data['progress']);
                        $('#kasuspending').html(data['pending']);
                        $('#kasusclosed').html(data['close']);
                    })
                    .fail(function () {
                        console.log("error");
                    });

            $.ajax({
                url: "{{URL::to('kasus-ajax/kasus-alert')}}",
                type: 'POST',
            })
                    .done(function (data) {
                        if (data > 0) {
                            var snd = new Audio('sound/RedAlert.wav');
                            snd.play();
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    });
            return true;
        });

        $.doTimeout(300000, function () {
            $.ajax({
                url: "{{URL::to('kasus-ajax/kasus-after-five')}}",
                type: 'POST',
            })
                    .done(function (data) {
                        if (data > 0) {
                            var snd = new Audio('sound/RedAlert.wav');
                            snd.play();
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    });
            return true;
        });
    </script>
@stop