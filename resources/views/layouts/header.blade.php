<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="/assets/images/logo-icon.png" alt="homepage" class="dark-logo"/>
                    <!-- Light Logo icon -->
                    <img src="/assets/images/logo-light-icon.png" alt="homepage" class="light-logo"/>
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="/assets/images/logo-text.png" alt="homepage" class="dark-logo"/>
                    <!-- Light Logo text -->
                         <img src="/assets/images/logo-light-text.png" class="light-logo" alt="homepage"/></span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                        href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                <li class="nav-item m-l-10"><a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>

            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    @php($locale = app()->getLocale())
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="flag-icon flag-icon-{{ $locale == "fr" ? "fr" : "gb" }}"></i></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <a class="dropdown-item" href="/locale?lang={{ $locale == "fr" ? "en" : "fr" }}">
                            <i class="flag-icon flag-icon-{{ $locale == "fr" ? "gb" : "fr" }}"></i> {{ $locale == "fr" ? "English" : "Français" }}
                        </a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                @php($user = \Illuminate\Support\Facades\Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="/assets/images/users/mairie.png" alt="user" class="profile-pic"/></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="/assets/images/users/user.svg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>@lang('general.city') {{ $user->city_name }}</h4>
                                        <p class="text-muted">{{ $user->email }}</p>
                                        <a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form id="logout" action="/logout" method="post">
                                    <a href="#" onclick="document.getElementById('logout').submit();"><i
                                                class="fa fa-power-off"></i>Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>