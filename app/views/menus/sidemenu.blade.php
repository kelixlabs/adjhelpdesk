<!-- BEGIN SIDEBAR -->
<div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search"/>
            </form>
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="sub-menu">
                <a class="" href="{{URL::to('/')}}">
                    <i class="icon-dashboard"></i>
                    <span>Halaman Depan</span>
                </a>
            </li>
            @if ($user->hasRole('kasus'))
                <li class="sub-menu">
                    <a href="javascript:" class="">
                        <i class="icon-book"></i>
                        <span>Kasus</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        @if ($user->hasRole('kasus'))
                            <li>{{HTML::link('/kasus/kirim', 'Kirim Kasus')}}</li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($user->hasRole('perawatan'))
                <li class="sub-menu">
                    <a href="javascript:" class="">
                        <i class="icon-book"></i>
                        <span>Perawatan</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        @if ($user->hasRole('perawatan'))
                            <li>{{HTML::link('/kasus/kirim', 'Perawatan Rutin')}}</li>
                        @endif
                        @if ($user->hasRole('supervisi'))
                            <li>{{HTML::link('/', 'Managemen Peralatan')}}</li>
                        @endif
                    </ul>
                </li>
            @endif
            @if ($user->hasRole('user_manager'))
                <li class="sub-menu">
                    <a class="" href="javascript:;">
                        <i class="icon-user"></i>
                        <span>User</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li>{{HTML::link('/users', 'User')}}</li>
                        <!--li>{{--HTML::link('/roles', 'Roles')--}}</li-->
                        <li>{{HTML::link('/bagian', 'Bagian')}}</li>
                    </ul>
                </li>
            @endif
            @if ($user->hasRole('laporan'))
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-file-alt"></i>
                        <span>Laporan</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li>{{HTML::link('/laporan/perbaikan', 'Perbaikan')}}</li>
                        <li>{{HTML::link('/', 'Perawatan')}}</li>
                    </ul>
                </li>
            @endif
            @if ($user->hasRole('konfigurasi'))
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-cogs"></i>
                        <span>Konfigurasi</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        @if ($user->hasRole('konfigurasi'))
                            <li>{{HTML::link('/', 'Aplikasi')}}</li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->