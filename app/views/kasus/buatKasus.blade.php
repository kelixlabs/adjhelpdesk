@extends('layout')
@section('title')
    @parent CRM | KASUS
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
    Kirim Kasus
@stop
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN SAMPLE FORMPORTLET-->
            <div class="widget green">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> Kirim Kasus </h4>
				<span class="tools">
				</span>
                </div>
                <div class="widget-body">
                    <!-- BEGIN FORM-->
                    {{Form::open(array('url'=>'kasus','method'=>'post','class'=>'form-horizontal', 'files' => true))}}
                    @if($user->bagian->bidang == 2)
                        <div class="control-group">
                            <label class="control-label">Pelapor</label>

                            <div class="controls">
                                <select class="span3 chzn-select" data-placeholder="Pilih Pelapor" tabindex="1"
                                        name="pelapor">
                                    <option value=""></option>
                                    @foreach (User::all() as $userUseran)
                                        @if($userUseran->bagian->bidang != 1 AND $userUseran->bagian->bidang != 2)
                                            <option value="{{$userUseran->id}}">{{$userUseran->nama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="control-group">
                            <label class="control-label">Bagian</label>

                            <div class="controls">
                                <input class="span6 " type="text" value="{{$user->bagian->bagian}}" disabled/>
                            </div>
                        </div>
                    @endif
                    <div class="control-group">
                        <label class="control-label">Kategori</label>

                        <div class="controls">
                            <select class="span2 chzn-select" data-placeholder="Pilih Status" tabindex="0"
                                    name="kategori">
                                @foreach (Kategori::all() as $kategori)
                                    <option value="{{$kategori->id}}">{{ucwords($kategori->kategori)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Kasus</label>

                        <div class="controls">
							<textarea name="kasus" id="kasus">
								&lt;p&gt;PC : &lt;/p&gt;
								&lt;p&gt;IP : &lt;/p&gt;
								&lt;p&gt;MAC : &lt;/p&gt;
								&lt;p&gt;KASUS : &lt;/p&gt;
							</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Lampiran</label>

                        <div class="controls">
                            <span class="label label-important">NOTE!</span>
							<span>
							Attached image thumbnail is
							supported in Latest Firefox, Chrome, Opera,
							Safari and Internet Explorer 10 only
							</span>

                            <div id="attachments">
                                <div data-provides="fileupload" class="fileupload fileupload-new newImage0">
                                    <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                                        {{HTML::image('template/img/no_image.png')}}
                                    </div>
                                    <div style="max-width: 200px; max-height: 150px; line-height: 20px;"
                                         class="fileupload-preview fileupload-exists thumbnail"></div>
                                    <div>
										<span class="btn btn-file"><span class="fileupload-new">Ambil File</span>
										<span class="fileupload-exists">Change</span>
										<input type="file" class="default" name="attach[]"></span>
                                        <a data-dismiss="fileupload" class="btn fileupload-exists" href="#"
                                           id='removeID' data-count='0'>Remove</a>
                                        <span class="btn fileupload-exists" id="addMore">Tambah</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Prioritas</label>

                        <div class="controls">
                            <select class="span3 chzn-select" data-placeholder="Pilih Prioritas" tabindex="1"
                                    name="prioritas">
                                <option value=""></option>
                                @foreach (Prioritas::all() as $prioritas)
                                    <option value="{{$prioritas->id}}">{{$prioritas->prioritas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status</label>

                        <div class="controls">
                            <select class="span2 chzn-select" data-placeholder="Pilih Status" tabindex="0"
                                    name="status">
                                @foreach (Status::all() as $status)
                                    <option value="{{$status->id}}">{{$status->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn" id="btnCancel">Batal</button>
                    </div>
                    {{Form::close()}}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
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
    {{HTML::script('template/assets/tinymce/tinymce.min.js')}}
    <script type="text/javascript">
        $(document).ready(function () {
            var count = 0;
            $('#addMore').live('click', function (event) {
                $('#addMore').detach();
                count++;
                var html = "<div data-provides='fileupload' class='fileupload fileupload-new newImage" + count + "'>";
                html += "<div style='width: 200px; height: 150px;' class='fileupload-new thumbnail'>";
                html += '{{HTML::image("template/img/no_image.png")}}';
                html += "</div>";
                html += "<div style='max-width: 200px; max-height: 150px; line-height: 20px;' class='fileupload-preview fileupload-exists thumbnail'></div>";
                html += "<div>";
                html += "<span class='btn btn-file'><span class='fileupload-new'>Select image</span>";
                html += "<span class='fileupload-exists'>Change</span>";
                html += "<input type='file' class='default' name='attach[]'></span>&nbsp;";
                html += "<a data-dismiss='fileupload' class='btn fileupload-exists' href='#' id='removeID' data-count='" + count + "'>Remove</a>";
                html += '&nbsp;<span class="btn fileupload-exists" id="addMore">Tambah</span>';
                html += "</div></div>";
                $('#attachments').append(html);
            });

            $('#removeID').live('click', function (event) {
                var idCount = $(this).attr('data-count');
                if (idCount != count) {
                    $('.newImage' + idCount).detach();
                }
            });

            $('#btnCancel').live('click', function (event) {
                document.location.href = "{{URL::to('/')}}";
            });
        });
    </script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea#kasus",
            theme: "modern",
            width: 300,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            menubar: false,
            content_css: "css/content.css",
            toolbar1: "print preview | bold italic underline strikethrough",
            toolbar2: "styleselect | forecolor backcolor emoticons | undo redo",
        });
    </script>
@stop