<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>NovelNest</title>
</head>
<body>

<nav class="dark:bg-gray-900 bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/images/logo.png" class="h-10 rounded-full" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap darktext-white">NovelNest</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if(auth()->check())
                    <!-- Jika pengguna sudah login, tampilkan tombol logout -->
                    <a href="{{ route('logoutUser') }}" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logoutUser') }}" method="POST">
                        @csrf
                    </form>
                @else
                    <!-- Jika pengguna belum login, tampilkan tombol login -->
                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        LogIn
                    </a>
                @endif
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="#home" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
            </li>
            <li>
                <a href="#bestSeller" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">BestSeller</a>
            </li>
            <li>
                <a href="#feedback" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Feeback</a>
            </li>
            <li>
                <a href="#new" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Newest</a>
            </li>
            </ul>
        </div>
    </div>
</nav>

<!-- hero Image start -->
<section class="bg-white dark:bg-gray-900">
    <div id="animation-carousel" class="relative w-full " data-carousel="static">
        <!-- Carousel wrapper -->

        <div class="relative h-screen z-10 overflow-hidden mt-16">
                <!-- Item 1 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                <img src="/images/N.jpg" class=" object-contain  absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="/images/N2.jpg" class=" object-contain  absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                    <img src="/images/N3.jpg" class=" absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="/images/N4.jpg" class="h-full absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="/images/N5.jpg" class="h-full absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
        </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
    </div>
</section>
<!-- Hero image End -->

<section id="home" class="bg-yellow-700 dark:bg-yellow-700 pt-20 pb-16">
    <div class="py-10 px-8 mx-auto max-w-screen-xl text-center lg:py-20">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">Selamat Datang Di Website NovelNest</h1>
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 lg:px-48 dark:text-white">NovelNest adalah Website yang mengenalkan dan mencerminkan beragam novel dengan membawa cerita ke buku yang diterbitkan dan ke rak buku di seluruh dunia. NovelNest menampilkan sebuah cerita website dan bisa kamu baca secara online.NovelNest tersebut akan update per-bab dengan jadwal tertentu, sehingga pembaca harus mengetahui jadwalnya agar tidak ketinggalan membaca.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="{{ route('home') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-yellow-900 hover:bg-yellow-900 focus:ring-4 focus:ring-yellow-900 dark:focus:ring-yellow-900">
                Mulai Baca
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<section id="bestSeller" class="h-screen bg-Indigo dark:bg-Indigo-400 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="flex-col justify-center h-full py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
        <div class="flex flex-col justify-center">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-yellow-900 md:text-5xl lg:text-6xl dark:yellow-900">BESTSELLER 2024</h1>
            <p class="mb-8 text-lg font-normal text-yellow-900 lg:text-xl dark:text-yellow-900">Novel Merindu Cahaya De Amstel adalah sebuah buku yang bercerita tentang kisah pahit sebuah kehidupan yang dijalani oleh Khadija, gadis Belanda yang memutuskan untuk masuk Islam. Setelah memutuskan untuk menjadi umat muslim, Khadija memiliki nama asli, yaitu Marienvenhofen...</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                <a href="{{ route('home') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-yellow-900 hover:bg-yellow-900 focus:ring-4 focus:ring-yellow-900 dark:focus:ring-yellow-900">
                    Baca Sekarang
                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a> 
            </div>
        </div>
        <div class="h-full">
            <figure class="lg:max-w-xl h-full">
                <img class="object-cover w-full h-full rounded-lg shadow-xl" src="/images/foto2.jpg" alt="image description">
            </figure>
        </div>
    </div>
</section>

<section id="feedback" class="bg-yellow-700 dark:bg-yellow-700 pt-35 pb-16">

    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">Dapatkan Cerita Favoritemu Di NovelNest</h1>
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 lg:px-48 dark:text-white">berikan komentar agar menjadi website lebih baik lagi</p>
        
        <form class="max-w-sm mx-auto">
            <label for="message" class="block mb-2 text-sm font-medium md:text-3xl text-white dark:text-white">Komentar</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-white bg-gray-50 rounded-lg border border-gray-300 focus:ring-yellow-600 focus:border-yellow-600 dark:bg-yellow-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-600 dark:focus:border-yellow-600" placeholder="Tulis di sini..."></textarea>
            <button type="submit" class="text-white bg-yellow-900 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-900 font-medium rounded-lg text-sm px-5 py-3 text-center mt-3 dark:bg-yellow-900 dark:hover:bg-yellow-900 dark:focus:ring-yellow-900">Simpan</button>
        </form>
    </div>
    <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div>
</section>

<section id="new" class="h-screen bg-Indigo dark:bg-Indigo-400 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="flex-col justify-center h-full py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
        <div class="h-screen p-3 relative">
            <div class="w-96 mx-auto" style="scroll-snap-type: x mandatory;">
                @forelse ($novels as $index => $novel)
                    <div class="{{ $index === 0 ? 'peer-checked' : '' }}">
                        <input class="sr-only peer" type="radio" name="carousel" id="carousel-{{ $index + 1 }}" {{ $index === 0 ? 'checked' : '' }} />
                        <a href="{{ $novel['volumeInfo']['previewLink'] ?? '#' }}" target="_blank" class="w-96 absolute top-60 left-14 transform -translate-y-1/2 bg-white rounded-lg shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                            <img class="rounded-t-lg w-96 h-64" src="{{ isset($novel['volumeInfo']['imageLinks']['thumbnail']) ? $novel['volumeInfo']['imageLinks']['thumbnail'] : 'https://via.placeholder.com/800x400' }}" alt="" />
                            
                            <div class="py-4 px-8 flex flex-col justify-center items-start h-full">
                                <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight">{{ $novel['volumeInfo']['title'] ?? 'Title Not Available' }}</h1>
                                <p class="hover:cursor-pointer py-3 text-gray-600 leading-6">{!! isset($novel['volumeInfo']['description']) ? Str::limit($novel['volumeInfo']['description'], 150) : 'tidak ada deskripsi' !!}</p>
                        
                                <div class="flex bottom-8 left-8">
                                    <div class="w-full flex justify-between z-20">
                                        @if ($index > 0)
                                            <label for="carousel-{{ $index }}" class="inline-block text-red-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                                                </svg>
                                            </label>
                                        @endif
                                
                                        @if ($index < count($novels) - 1)
                                            <label for="carousel-{{ $index + 2 }}" class="inline-block text-red-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">Belum ada data.</p>
                @endforelse
            </div>
        </div>
        <div class="flex-col justify-center">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-yellow-900 md:text-5xl lg:text-6xl dark:text-yellow-900">Newest 2024</h1>
            <p class="mb-8 text-lg font-normal text-yellow-900 lg:text-xl dark:text-yellow-900">"Dunia yang Terbuka" adalah persembahan terbaru dalam dunia literasi yang akan menghipnotis pembaca dengan cerita yang penuh warna dan tak terlupakan. Dikemas dengan plot yang menggugah, karakter-karakter yang hidup, dan twist tak terduga, buku ini membawa Anda dalam perjalanan melintasi dimensi-dimensi yang belum pernah Anda bayangkan. Sambutlah cerita yang penuh dengan misteri, petualangan, dan keajaiban. "Dunia yang Terbuka" akan mengubah cara Anda melihat buku dan membawa Anda ke perjalanan menakjubkan ke dalam pikiran penulis yang kreatif dan imajinatif. Jelajahi karya terbaru ini dan temukan dunia yang baru dan menarik di setiap halaman.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 items-start">
                <a href="{{ route('home') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-yellow-900 hover:bg-yellow-900 focus:ring-4 focus:ring-yellow-900 dark:focus:ring-yellow-900">
                    Baca Lebih Lanjut
                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a> 
            </div>
        </div>
        
    </div>
</section>
{{-- 
<div class="h-screen p-3 relative bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')]">
    <div class="w-96 mx-auto" style="scroll-snap-type: x mandatory;">
        @forelse ($novels as $index => $novel)
            <div class="{{ $index === 0 ? 'peer-checked' : '' }}">
                <input class="sr-only peer" type="radio" name="carousel" id="carousel-{{ $index + 1 }}" {{ $index === 0 ? 'checked' : '' }} />

                <a href="{{ $novel['volumeInfo']['previewLink'] ?? '#' }}" target="_blank" class="w-96 absolute top-1/2 right-40 transform -translate-y-1/2 bg-white rounded-lg shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
                    <img class="rounded-t-lg w-96 h-64" src="{{ isset($novel['volumeInfo']['imageLinks']['thumbnail']) ? $novel['volumeInfo']['imageLinks']['thumbnail'] : 'https://via.placeholder.com/800x400' }}" alt="" />
                
                    <div class="py-4 px-8">
                        <h1 class="hover:cursor-pointer mt-2 text-gray-900 font-bold text-2xl tracking-tight">{{ $novel['volumeInfo']['title'] ?? 'Title Not Available' }}</h1>
                        <p class="hover:cursor-pointer py-3 text-gray-600 leading-6">{!! isset($novel['volumeInfo']['description']) ? Str::limit($novel['volumeInfo']['description'], 150) : 'tidak ada deskripsi' !!}</p>
                    </div>
                
                    <div class="absolute top-1/2 w-full flex justify-between z-20">
                        @if ($index > 0)
                            <label for="carousel-{{ $index }}" class="inline-block text-red-600 cursor-pointer -translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        @endif
                
                        @if ($index < count($novels) - 1)
                            <label for="carousel-{{ $index + 2 }}" class="inline-block text-red-600 cursor-pointer translate-x-5 bg-white rounded-full shadow-md active:translate-y-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        @endif
                    </div>
                </a>
                
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">Belum ada data.</p>
        @endforelse
    </div>
</div> --}}

<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/" class="hover:underline">NovelNest</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">About</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
    </div>
</footer>


</body>
</html>