<header class="topbar">
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <b>
                    <img src="/assets/images/users/user.svg" id="main-logo" style="height: 80px"/>
                </b>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <script>
                function changeLogoSize() {
                    if ($("#main-logo").css("height") === "80px")
                        $('#main-logo').css('height', '30px');
                    else
                        $('#main-logo').css('height', '80px');

                }
            </script>
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                        href="javascript:void(0)" onclick="changeLogoSize();"><i class="mdi mdi-menu"></i></a></li>
                <li class="nav-item m-l-10"><a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)" onclick="changeLogoSize();"><i class="ti-menu"></i></a></li>

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
                                        <a href="/profile" class="btn btn-rounded btn-danger btn-sm">@lang('general.profile')</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form id="logout" action="/logout" method="post">
                                    {{ csrf_field() }}
                                    <a href="#" onclick="document.getElementById('logout').submit();"><i
                                                class="fa fa-power-off"></i> Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>