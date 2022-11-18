<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">JooProfile</span>

        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Page Sections
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/section/showBaseSection/hero-section">
                    <i class="align-middle" data-feather="award"></i> <span class="align-middle">Hero</span>
                </a>
                <a class="sidebar-link" href="/section/showBaseSection/brick-section">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Brick</span>
                </a>
                <a class="sidebar-link" href="/section/showBaseSection/simple-text-section">
                    <i class="align-middle" data-feather="align-center"></i> <span class="align-middle">Simple Text</span>
                </a>
            </li>

            <hr>
            <li class="sidebar-item">

                <a class="sidebar-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>


        </ul>

    </div>
</nav>