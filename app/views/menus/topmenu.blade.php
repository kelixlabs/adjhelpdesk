<!-- BEGIN NOTIFICATION -->
<ul class="nav top-menu">
    <!-- BEGIN SETTINGS -->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-tasks"></i>
            <span class="badge badge-important">6</span>
        </a>
        <ul class="dropdown-menu extended tasks-bar">
            <li>
                <p>You have 6 pending tasks</p>
            </li>
            <li>
                <a href="#">
                    <div class="task-info">
                        <div class="desc">Dashboard v1.3</div>
                        <div class="percent">44%</div>
                    </div>
                    <div class="progress progress-striped active no-margin-bot">
                        <div class="bar" style="width: 44%;"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="task-info">
                        <div class="desc">Database Update</div>
                        <div class="percent">65%</div>
                    </div>
                    <div class="progress progress-striped progress-success active no-margin-bot">
                        <div class="bar" style="width: 65%;"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="task-info">
                        <div class="desc">Iphone Development</div>
                        <div class="percent">87%</div>
                    </div>
                    <div class="progress progress-striped progress-info active no-margin-bot">
                        <div class="bar" style="width: 87%;"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="task-info">
                        <div class="desc">Mobile App</div>
                        <div class="percent">33%</div>
                    </div>
                    <div class="progress progress-striped progress-warning active no-margin-bot">
                        <div class="bar" style="width: 33%;"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="task-info">
                        <div class="desc">Dashboard v1.3</div>
                        <div class="percent">90%</div>
                    </div>
                    <div class="progress progress-striped progress-danger active no-margin-bot">
                        <div class="bar" style="width: 90%;"></div>
                    </div>
                </a>
            </li>
            <li class="external">
                <a href="#">See All Tasks</a>
            </li>
        </ul>
    </li>
    <!-- END SETTINGS -->
    <!-- BEGIN NOTIFICATION DROPDOWN -->
    <li class="dropdown" id="header_notification_bar">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-bell-alt"></i>
            <span class="badge badge-warning">7</span>
        </a>
        <ul class="dropdown-menu extended notification">
            <li>
                <p>You have 7 new notifications</p>
            </li>
            <li>
                <a href="#">
                    <span class="label label-important"><i class="icon-bolt"></i></span>
                    Server #3 overloaded.
                    <span class="small italic">34 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-warning"><i class="icon-bell"></i></span>
                    Server #10 not respoding.
                    <span class="small italic">1 Hours</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-important"><i class="icon-bolt"></i></span>
                    Database overloaded 24%.
                    <span class="small italic">4 hrs</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-success"><i class="icon-plus"></i></span>
                    New user registered.
                    <span class="small italic">Just now</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-info"><i class="icon-bullhorn"></i></span>
                    Application error.
                    <span class="small italic">10 mins</span>
                </a>
            </li>
            <li>
                <a href="#">See all notifications</a>
            </li>
        </ul>
    </li>
    <!-- END NOTIFICATION DROPDOWN -->
</ul>
</div>
<!-- END  NOTIFICATION -->
<div class="top-nav ">
    <ul class="nav pull-right top-menu">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="username">{{Auth::user()->nama}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{URL::to('/users/'.$user->id)}}"><i class="icon-user"></i> My Profile</a></li>
                <!--li><a href="#"><i class="icon-cog"></i> My Settings</a></li-->
                <li><a href="{{URL::to('/logout')}}"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU -->