@extends('logins.layout')
@section('title')
    @parent Pendaftaran
@stop
@section('style')
    {{HTML::style('template/assets/chosen-bootstrap/chosen/chosen.css')}}
    @parent
    <style type="text/css">
        .chzn-container .chzn-results {
            color: #888;
        }

        .chzn-drop .chzn-search input:focus {
            border: 1px solid #0ff !important;
            color: #888;
        }
    </style>
@stop
@section('content')
    {{Form::open(array('method'=>'post'))}}
    <div class="metro single-size red">
        <div class="locked">
            <i class="icon-lock"></i>
            <span>Pendaftaran</span>
        </div>
    </div>
    <div class="metro double-size navy-blue">
        <div class="input-append lock-input">
            <input type="text" placeholder="Username" name="Username" id="reguname"
                   value="{{Input::old('regusername')}}">
        </div>
        {{$errors->first('Username','<div class="alert alert-error">:message</div>')}}
    </div>
    <div class="metro double-size deep-red">
        <div class="input-append lock-input">
            <input type="password" placeholder="Password" name="Password">
        </div>
        {{$errors->first('Password','<div class="alert alert-error">:message</div>')}}
    </div>
    <div class="metro single-size red">
        <div class="locked">
            <i class="icon-lock"></i>
            <span>Pendaftaran</span>
        </div>
    </div>
    <div class="metro single-size blue">
        <div class="locked">
            <i class="icon-lock"></i>
            <span>Pendaftaran</span>
        </div>
    </div>
    <div class="metro double-size green">
        <div class="input-append lock-input">
            <input type="text" placeholder="Nama lengkap" name="Nama" value="{{Input::old('regnama')}}">
        </div>
        {{$errors->first('Nama','<div class="alert alert-error">:message</div>')}}
    </div>
    <div class="metro double-size purple">
        <div class="lock-input">
            <select class="chzn-select" data-placeholder="Pilih Bagian" tabindex="0" name="Bagian">
                <option value=""></option>
                @foreach (Bagian::where('bidang','=',1)->where('id','<>',1)->get() as $bidang)
                    <optgroup label="{{$bidang->bagian}}">
                        @foreach (Bagian::where('bidang','=',$bidang->id)->where('bidang','<>',1)->get() as $bagian)
                            <option value="{{$bagian->id}}">{{$bagian->bagian}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        {{$errors->first('Bidang','<div class="alert alert-error">:message</div>')}}
    </div>
    <div class="metro single-size blue">
        <button type="submit" class="btn login-btn">
            DAFTAR
            <i class=" icon-long-arrow-right"></i>
        </button>
    </div>
    <div class="login-footer">
        <div class="remember-hint pull-left">
        </div>
        <div class="forgot-hint pull-right">
            {{HTML::link('login', 'Sudah Terdaftar!')}}
        </div>
    </div>
    {{Form::close()}}
@stop
@section('script')
    @parent
    {{HTML::script('template/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js')}}
    {{HTML::script('template/assets/chosen-bootstrap/chosen/chosen.jquery.min.js')}}
    <script type="text/javascript">
        $(document).ready(function () {
            $(".chzn-select").chosen();
            $("#reguname").focus();
        });
    </script>
@stop