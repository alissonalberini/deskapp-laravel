<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/">
            <img src="{{ asset('images/deskapp-logo.png') }}" alt="">
        </a>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-home"></span><span class="mtext">Home</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/dashboard">{{ __('Dashboard') }} 1</a></li>
                        <li><a href="/dashboard2">{{ __('Dashboard') }} 2</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-pencil"></span><span class="mtext">Formulários</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('users.create') }}">{{ __('New User') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-table"></span><span class="mtext">Tables</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('users.index') }}">{{ __('Users') }} Laravel</a></li>
                        <li><a href="{{ route('users.index2') }}">{{ __('Users') }} Datatables</a></li>
                        <li><a href="{{ route('users.index3') }}">{{ __('Users') }} Bootstrap-tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/calendar" class="dropdown-toggle no-arrow">
                        <span class="fa fa-calendar-o"></span><span class="mtext">Calendar</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-clone"></span><span class="mtext">Extra Pages</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/blank">Blank</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/invoice" class="dropdown-toggle no-arrow">
                        <span class="fa fa-map-o"></span><span class="mtext">Invoice</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>