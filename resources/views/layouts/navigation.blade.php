<nav x-data="{ open: false }" class="bg-white border-r border-gray-300 fixed h-screen flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16">
        <a href="{{ route('dashboard') }}">
            <img src="/images/logo.png" class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="flex flex-col flex-1 justify-between">
        <div class="flex flex-col space-y-4 mt-4">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            @if (auth()->user()->role_id == 1)
            <x-nav-link :href="route('dashboard.manageuser')" :active="request()->routeIs('dashboard.manageuser')">
                {{ __('Manage User') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard.managerole')" :active="request()->routeIs('dashboard.managerole')">
                {{ __('Manage Role') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard.product')" :active="request()->routeIs('dashboard.product')">
                {{ __('Manage Produk') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard.categoryproduct')" :active="request()->routeIs('dashboard.categoryproduct')">
                {{ __('Kategori Produk') }}
            </x-nav-link>
            @endif

            @if (auth()->user()->role_id == 2)
            <x-nav-link :href="route('dashboard.product')" :active="request()->routeIs('dashboard.product')">
                {{ __('Produk Saya') }}
            </x-nav-link>
            <x-nav-link :href="route('dashboard.categoryproduct')" :active="request()->routeIs('dashboard.categoryproduct')">
                {{ __('Kategori Produk') }}
            </x-nav-link>
            @endif
        </div>

        <!-- Settings Dropdown -->
        <div class="flex flex-col mt-auto">
            <div class="px-4 mb-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="space-y-4 px-4">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('homepage')">
                    {{ __('Homepage') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

    <!-- Hamburger -->
    <div class="sm:hidden flex justify-center">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
