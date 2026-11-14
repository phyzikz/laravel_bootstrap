<nav class="navbar lg:navbar-expand bg-body border-bottom">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <x-application-logo style="height: 2rem; width: auto;" />
        </a>

        <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#appNavbar" aria-controls="appNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" aria-hidden="true"></span>
        </button>

        <dialog class="drawer drawer-end" tabindex="-1" id="appNavbar" aria-labelledby="appNavbarLabel">
            <div class="drawer-header">
                <h5 class="drawer-title" id="appNavbarLabel">{{ __('Menu') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
            </div>
            <div class="drawer-body mb-2 lg:mb-0">
                <ul class="nav navbar-nav me-auto">
                    <li class="nav-item">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>
                </ul>

                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item">
                        <button class="nav-link" type="button" data-bs-toggle="menu" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="menu">
                            <a class="menu-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="menu-item w-100 text-start border-0 bg-transparent">{{ __('Log Out') }}</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </dialog>
    </div>
</nav>
