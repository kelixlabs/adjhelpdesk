@extends('logins.layout')
@section('title')
    @parent Login
@stop
@section('content')
    @if(Session::has('message'))
        @if(Session::get('message') == 'error')
            <div class="alert alert-block alert-error">
                <h4 class="alert-heading">Error!</h4>

                <p>Username anda belum terdaftar!</p>
            </div>
        @elseif(Session::get('message') == 'warning')
            <div class="alert alert-block alert-warning fade in">
                <h4 class="alert-heading">Warning!</h4>

                <p>Isikan nomor Counter anda</p>
            </div>
        @else()
            execute if else
        @endif
    @endif
    {{Form::open(array('method'=>'post'))}}
    <div class="metro single-size red">
        <div class="locked">
            <i class="icon-lock"></i>
            <span>Login</span>
        </div>
    </div>
    <div class="metro double-size navy-blue">
        <div class="input-append lock-input">
            <input type="text" placeholder="nip" name="nip" id="uname">
        </div>
    </div>
    <div class="metro double-size green">
        <div class="input-append lock-input">
            <select class="chzn-select" data-placeholder="Pilih Bagian" tabindex="0" name="counter">
                @for($i=1;$i<=13;$i++)
                    <option value={{ $i }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="metro single-size purple login">
        <button type="submit" class="btn login-btn">
            Login
            <i class=" icon-long-arrow-right"></i>
        </button>
    </div>
    <div class="login-footer">
        <div class="remember-hint pull-left">
            <input type="checkbox" name="rememberme" checked="checked">Selalu ingat saya
        </div>
        <div class="forgot-hint pull-right">
            {{HTML::link('/pendaftaran', 'Belum terdaftar?')}}
        </div>
    </div>
    {{Form::close()}}
@stop
@section('script')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $('#uname').focus();
        });
    </script>
@stop