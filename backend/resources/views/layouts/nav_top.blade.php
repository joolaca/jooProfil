<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-align">

            @if(session('lang', 'hu') == 'hu')
                <a href="/change-language/en">
                    <img class="navbar-flags" src="/admin/img/flags/en.png" alt="">
                </a>
            @else
                <a href="/change-language/hu">
                    <img class="navbar-flags" src="/admin/img/flags/hu.png" alt="">
                </a>

            @endif

    </div>

</nav>