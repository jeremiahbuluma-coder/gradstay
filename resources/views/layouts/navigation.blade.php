<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <div class="font-bold text-xl text-gray-800">
                GRADSTAY
            </div>

            <!-- LINKS -->
            <div class="flex items-center space-x-6">

                <!-- PUBLIC LINKS (ONLY HERE) -->
                <a href="/" class="text-gray-700 font-semibold hover:text-blue-600">
                    Home
                </a>

                @guest
                    <a href="#" class="text-gray-700 font-semibold hover:text-blue-600">
                        About Us
                    </a>

                    <a href="#" class="text-gray-700 font-semibold hover:text-blue-600">
                        Contact Us
                    </a>
                @endguest

                <!-- AUTH LINKS -->
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 font-semibold hover:text-blue-600">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 font-semibold hover:text-red-800">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:text-blue-800">
                        Login
                    </a>
                @endauth

            </div>

        </div>
    </div>
</nav>