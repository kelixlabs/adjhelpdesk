@extends('layout')
@section('title')
    @parent CRM | DETAIL KASUS
@stop
@section('style')
    @parent
    {{HTML::style('template/assets/chosen-bootstrap/chosen/chosen.css')}}
    {{HTML::style('template/assets/jquery-tags-input/jquery.tagsinput.css')}}
    {{HTML::style('template/assets/clockface/css/clockface.css')}}
    {{HTML::style('template/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
    {{HTML::style('template/assets/bootstrap-datepicker/css/datepicker.css')}}
    {{HTML::style('template/assets/bootstrap-timepicker/compiled/timepicker.css')}}
    {{HTML::style('template/assets/bootstrap-colorpicker/css/colorpicker.css')}}
    {{HTML::style('template/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css')}}
    {{HTML::style('template/assets/bootstrap-daterangepicker/daterangepicker.css')}}
@stop
@section('pageTitle')
    Detail Kasus #{{$kasus->id}}
@stop
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN SAMPLE FORMPORTLET-->
            <div class="widget red">
                <div class="widget-title">
                    <h4> Detail Kasus #{{$kasus->id}}</h4>
				<span class="tools">
				</span>
                </div>
                <div class="widget-body">
                    <!-- BEGIN FORM-->
                    <div class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Kasus ID</label>

                            <div class="controls">
                                <span class="help-inline">#{{$kasus->id}}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Pelapor</label>

                            <div class="controls">
                                <span class="help-inline">{{$kasus->user->nama}}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Prioritas</label>

                            <div class="controls">
                                <span class="help-inline">{{$kasus->prioritas->prioritas}}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Kasus</label>

                            <div class="controls">
                                <span class="help-inline"><p class="text-error">{{$kasus->kasus}}</p></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Waktu Kasus</label>

                            <div class="controls">
                                <span class="help-inline">{{$kasus->created_at}}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Status Akhir</label>

                            <div class="controls">
							<span class="help-inline">
							@if($kasus->status_id == 1)
                                    <p class="text-error">{{$kasus->status->status}}</p>
                                @elseif($kasus->status_id == 2)
                                    <p class="text-warning">{{$kasus->status->status}}</p>
                                @elseif($kasus->status_id == 3)
                                    <p class="text-warning">{{$kasus->status->status}}</p>
                                @elseif($kasus->status_id == 4)
                                    <p class="text-info">{{$kasus->status->status}}</p>
                                @elseif($kasus->status_id == 5)
                                    <p class="text-success">{{$kasus->status->status}}</p>
                                @endif
							</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Waktu Ubah Status</label>

                            <div class="controls">
                                <span class="help-inline">{{$kasus->updated_at}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <!-- BEGIN BASIC PORTLET-->
            <div class="widget orange">
                <div class="widget-title">
                    <h4> Tindak Lanjut</h4>
                </div>
                <div class="widget-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Tindakan</th>
                            <th>Waktu</th>
                            <th>Petugas</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($kasus->tindakan as $tindak)
                            <tr>
                                <td>#{{$tindak->id}}</td>
                                <td>{{$tindak->tindakan}}</td>
                                <td>{{$tindak->created_at}}</td>
                                <td>{{$tindak->user->nama}}</td>
                                <td>
                                    @if($tindak->status_id == 1)
                                        <span class="label label-important">{{$tindak->status->status}}</span>
                                    @elseif($tindak->status_id == 2)
                                        <span class="label label-warning">{{$tindak->status->status}}</span>
                                    @elseif($tindak->status_id == 3)
                                        <span class="label label-warning">{{$tindak->status->status}}</span>
                                    @elseif($tindak->status_id == 4)
                                        <span class="label label-info">{{$tindak->status->status}}</span>
                                    @elseif($tindak->status_id == 5)
                                        <span class="label label-success">{{$tindak->status->status}}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-small btn-warning" id="btTindak"><i class="icon-plus icon-white"></i> Tindak
                        Lanjut
                    </button>
                    <hr/>
                    <div id="formTindakan" style="display:none;">
                        {{Form::open(array('url'=>'tindakan','method'=>'post','id'=>'fTindakan'))}}
                        {{Form::hidden('kasus', $kasus->id)}}
                        <div class="control-group">
                            <label class="control-label">Tindak Lanjut</label>

                            <div class="controls controls-row">
                                <textarea rows="4" name="tindakan">Tindak lanjut.</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Status</label>

                            <div class="controls controls-row">
                                <select class="chzn-select" data-placeholder="Pilih Status" tabindex="0" name="status">
                                    @foreach (Status::all() as $status)
                                        <option value="{{$status->id}}">{{$status->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn" id="cancelTindakan">Cancel</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <!-- END BASIC PORTLET-->
        </div>
        <div class="span6">
            <!-- BEGIN BASIC PORTLET-->
            <div class="widget orange">
                <div class="widget-title">
                    <h4> Lampiran</h4>
                </div>
                <div class="widget-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nama File</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($kasus->lampiran as $lampiran)
                            <tr>
                                <td>#{{$lampiran->id}}</td>
                                <td>{{$lampiran->lampiran}}</td>
                                <td>{{$lampiran->deskripsi}}</td>
                                <td>{{HTML::link('lampiran/'.$lampiran->id, 'Download', array('class'=>'btn btn-success btn-small'))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-small btn-warning" id="btLampir"><i class="icon-plus icon-white"></i> Tambah
                        Lampiran
                    </button>
                    <hr/>
                    <div id="formLampiran" style="display:none;">
                        {{Form::open(array('url'=>'lampiran', 'method'=>'post','id'=>'fLampiran', 'files' => true))}}
                        {{Form::hidden('kasus', $kasus->id)}}
                        <div class="control-group">
                            <label class="control-label">Lampiran</label>

                            <div class="controls">
                                <div id="attachments">
                                    <div data-provides="fileupload" class="fileupload fileupload-new">
                                        <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                                            {{HTML::image('template/img/no_image.png')}}
                                        </div>
                                        <div style="max-width: 200px; max-height: 150px; line-height: 20px;"
                                             class="fileupload-preview fileupload-exists thumbnail"></div>
                                        <div>
										<span class="btn btn-file"><span class="fileupload-new">Ambil File</span>
										<span class="fileupload-exists">Change</span>
										<input type="file" class="default" name="attachment"></span>
                                            <a data-dismiss="fileupload" class="btn fileupload-exists"
                                               href="#">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Deskripsi</label>

                            <div class="controls controls-row">
                                <textarea rows="3" name="deskripsi">Deskripsi lampiran</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn" id="cancelLampiran">Cancel</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <!-- END BASIC PORTLET-->
        </div>
    </div>
@stop
@section('bootstrapScript')
    {{HTML::script('template/assets/bootstrap/js/bootstrap-fileupload.js')}}
@stop
@section('componentScript')
    {{HTML::script('template/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js')}}
    {{HTML::script('template/assets/chosen-bootstrap/chosen/chosen.jquery.min.js')}}
    {{HTML::script('template/assets/clockface/js/clockface.js')}}
    {{HTML::script('template/assets/jquery-tags-input/jquery.tagsinput.min.js')}}
    {{HTML::script('template/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script('template/assets/bootstrap-daterangepicker/date.js')}}
    {{HTML::script('template/assets/bootstrap-daterangepicker/daterangepicker.js')}}
    {{HTML::script('template/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}
    {{HTML::script('template/assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}
    {{HTML::script('template/assets/fancybox/source/jquery.fancybox.pack.js')}}
@stop
@section('pageScript')
    {{HTML::script('template/js/form-component.js')}}
    <script type="text/javascript">
        $(document).ready(function () {

            $('#btTindak').live('click', function (event) {
                $('#formTindakan').show('fast', 'easeInOutCubic');
            });

            $('#cancelTindakan').live('click', function (event) {
                $('#formTindakan').hide('slow', 'easeInOutCubic');
            });

            $('#btLampir').live('click', function (event) {
                $('#formLampiran').show('fast', 'easeInOutCubic');
            });

            $('#cancelLampiran').live('click', function (event) {
                $('#formLampiran').hide('slow', 'easeInOutCubic');
            });

        });
    </script>
@stop