{{-- navbar --}}
<nav class="bg-yellow-900 text-white dark:bg-gray-900 w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('/images/logoLoginRegister.png')}}" class="h-9 w-9 rounded-full" style="min-width" alt="NovelNest Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white md:hover:text-yellow-400">NovelNest</span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="flex text-sm bg-gray-900 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-yellow-900 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
                @if (Auth::check())
                    <span class="block text-sm text-white dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-gray-100 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                @endif
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
                @if(auth()->check()) {{-- Memeriksa apakah pengguna sudah masuk --}}
                    @if(auth()->user()->hasRole('admin')) {{-- Memeriksa apakah pengguna adalah admin --}}
                        <li class="flex-1 items-center">
                            <a href="{{ route('admin') }}" class="flex items-center px-4 py-2 text-sm text-white hover:bg-yellow-400 dark:bg-yellow-400 dark:text-gray-200 dark:hover:text-white">
                                <svg class="w-3 h-3 mr-2 mt-1 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                    @else {{-- Jika bukan admin, anggap pengguna adalah user --}}
                        <li class="flex-1 items-center">
                            <a href="{{ route('writeNovel') }}" class="flex items-center px-4 py-2 text-sm text-white hover:bg-yellow-400 dark:bg-yellow-400 dark:text-gray-200 dark:hover:text-white">
                                <svg class="w-3 h-3 mr-2 mt-1 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"/>
                                </svg>
                                Write
                            </a>
                        </li>
                    @endif
                @endif
                <li class="flex-1 items-center">
                    <a href="{{ route('logoutUser') }}" class="flex items-center px-4 py-2 text-sm text-white hover:bg-yellow-400 dark:text-gray-200 dark:hover:text-white" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><svg class="w-3 h-3 mr-2 mt-1 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                    </svg> Sign Out</a>
                    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-yellow-900 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-yellow-900 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="{{ route('home') }}" class="block py-2 px-3 text-white rounded hover:bg-yellow-400 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0 dark:text-white md:dark:hover:text-yellow-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
            </li>
            <li>
                <a href="{{ route('mybookIndex') }}" class="block py-2 px-3 text-white rounded hover:bg-yellow-400 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0 dark:text-white md:dark:hover:text-yellow-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">MyBook</a>
            </li>
            <li>
                <a href="{{ route('listKategori') }}" class="block py-2 px-3 text-white rounded hover:bg-yellow-400 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0 dark:text-white md:dark:hover:text-yellow-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Kategori</a>
            </li>
            {{-- <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Genre 
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>   
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                        <a href="/genre" class="block px-4 py-2 hover:bg-yellow-900 dark:hover:bg-gray-600 dark:hover:text-white">Romance</a>
                        </li>
                        <li>
                        <a href="/genre" class="block px-4 py-2 hover:bg-yellow-900 dark:hover:bg-gray-600 dark:hover:text-white">Horror</a>
                        </li>
                        <li>
                        <a href="/genre" class="block px-4 py-2 hover:bg-yellow-900 dark:hover:bg-gray-600 dark:hover:text-white">Fantasy</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li>
                <a href="{{ route('showReadingHistory') }}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Riwayat</a>
            </li>
        </ul>
    </div>
    </div>
</nav>

{{-- end navbar --}}