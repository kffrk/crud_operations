<!-- sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="/"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="/"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <i class="mdi mdi-account" style="font-size: 30px;"></i>
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h5>
                        <span>{{ Auth::user()->role->name }}</span>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items {{ (request()->is('/')) ? 'active' : '' }}">
            <a class="nav-link" href="/">
        <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
        </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ (request()->is('leagues/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/leagues">
        <span class="menu-icon">
            <i class="mdi mdi-trophy-outline"></i>
        </span>
                <span class="menu-title">Leagues</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ (request()->is('clubs/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/clubs">
        <span class="menu-icon">
            <i class="mdi mdi-shield-outline"></i>
        </span>
                <span class="menu-title">Clubs</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ (request()->is('players/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/players">
        <span class="menu-icon">
            <i class="mdi mdi-account-multiple-outline"></i>
        </span>
                <span class="menu-title">Players</span>
            </a>
        </li>
    </ul>
</nav>
<!-- sidebar end -->
