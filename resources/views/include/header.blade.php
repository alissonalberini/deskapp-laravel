<div class="pre-loader"></div>
<div class="header clearfix">
    <div class="header-right">
        <div class="brand-logo">
            <a href="index.php">
                <img src="{{ asset('images/logo.png') }}" alt="" class="mobile-logo">
            </a>
        </div>
        <div class="menu-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon"><i class="fa fa-user-o" style="padding-top: 5px;"></i></span>
                    <span class="user-name">@auth {{ Auth::user()->name }} @endauth</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @auth
                    <a class="dropdown-item" href="/user/editar/{{ Auth::user()->id }}"><i class="fa fa-user-md" aria-hidden="true"></i> {{ __('Profile') }}</a>
                    @endauth
                    <a class="dropdown-item" href="/config"><i class="fa fa-cog" aria-hidden="true"></i> {{ __('Settings') }}</a>
                    <a class="dropdown-item" href="/help"><i class="fa fa-question" aria-hidden="true"></i> {{ __('Help') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Sign Out') }}</a>
                </div>
            </div>
        </div>
        
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            @isset($notifications)
                                @forelse ($notifications as $notification)
                                    <li>
                                        <a href="#">
                                            <img src="{{ asset('images/img.jpg') }}" alt="">
                                            <h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                        </a>
                                    </li>
                                @empty
                                    <p>No notifications</p>
                                @endforelse
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>