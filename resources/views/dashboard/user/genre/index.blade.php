@extends('dashboard.layout.main')
<div class="flex flex-wrap justify-center bg-white">
@section('container')
    <div class="flex flex-wrap justify-center">
        {{-- <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Apple Watch Series 7 GPS, Aluminium Case, Starlight Sport</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                    <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                </div>
            </div>
        </div> --}}
        <div class="max-w-sm mx-2 my-4 bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/800x400" alt="Product Image">
        
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Judul Buku</h2>
                <p class="text-gray-600 mt-2">Deskripsi singkat buku akan ditampilkan di sini. Anda dapat menambahkan lebih banyak teks sesuai kebutuhan Anda.</p>
        
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>4,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                        </svg>
                        <p class="flex-1">5,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-auto">100 Halaman</span>
                </div>
                {{-- bintang --}}
                
        
                <div class="mt-4 flex items-center justify-between">
                    <button class="text-white bg-[#557C55] hover:bg-[#446646] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Baca Sekarang</button>
                    <button class="text-gray-600 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Tambah ke MyBook</button>
                </div>
            </div>
        </div>
        <div class="max-w-sm mx-2 my-4 bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/800x400" alt="Product Image">
        
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Judul Buku</h2>
                <p class="text-gray-600 mt-2">Deskripsi singkat buku akan ditampilkan di sini. Anda dapat menambahkan lebih banyak teks sesuai kebutuhan Anda.</p>
        
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>4,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                        </svg>
                        <p class="flex-1">5,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-auto">100 Halaman</span>
                </div>
                {{-- bintang --}}
                
        
                <div class="mt-4 flex items-center justify-between">
                    <button class="text-white bg-[#557C55] hover:bg-[#446646] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Baca Sekarang</button>
                    <button class="text-gray-600 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Tambah ke MyBook</button>
                </div>
            </div>
        </div>
        <div class="max-w-sm mx-2 my-4 bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/800x400" alt="Product Image">
        
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Judul Buku</h2>
                <p class="text-gray-600 mt-2">Deskripsi singkat buku akan ditampilkan di sini. Anda dapat menambahkan lebih banyak teks sesuai kebutuhan Anda.</p>
        
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>4,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                        </svg>
                        <p class="flex-1">5,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-auto">100 Halaman</span>
                </div>
                {{-- bintang --}}
               
        
                <div class="mt-4 flex items-center justify-between">
                    <button class="text-white bg-[#557C55] hover:bg-[#446646] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Baca Sekarang</button>
                    <button class="text-gray-600 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Tambah ke MyBook</button>
                </div>
            </div>
        </div>
        <div class="max-w-sm mx-2 my-4 bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/800x400" alt="Product Image">
        
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Judul Buku</h2>
                <p class="text-gray-600 mt-2">Deskripsi singkat buku akan ditampilkan di sini. Anda dapat menambahkan lebih banyak teks sesuai kebutuhan Anda.</p>
        
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>4,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                        </svg>
                        <p class="flex-1">5,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-auto">100 Halaman</span>
                </div>
                {{-- bintang --}}
                
        
                <div class="mt-4 flex items-center justify-between">
                    <button class="text-white bg-[#557C55] hover:bg-[#446646] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Baca Sekarang</button>
                    <button class="text-gray-600 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Tambah ke MyBook</button>
                </div>
            </div>
        </div>
        <div class="max-w-sm mx-2 my-4 bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/800x400" alt="Product Image">
        
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Judul Buku</h2>
                <p class="text-gray-600 mt-2">Deskripsi singkat buku akan ditampilkan di sini. Anda dapat menambahkan lebih banyak teks sesuai kebutuhan Anda.</p>
        
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>4,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                        </svg>
                        <p class="flex-1">5,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-auto">100 Halaman</span>
                </div>
                {{-- bintang --}}
               
        
                <div class="mt-4 flex items-center justify-between">
                    <button class="text-white bg-[#557C55] hover:bg-[#446646] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Baca Sekarang</button>
                    <button class="text-gray-600 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Tambah ke MyBook</button>
                </div>
            </div>
        </div>
        <div class="max-w-sm mx-2 my-4 bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/800x400" alt="Product Image">
        
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Judul Buku</h2>
                <p class="text-gray-600 mt-2">Deskripsi singkat buku akan ditampilkan di sini. Anda dapat menambahkan lebih banyak teks sesuai kebutuhan Anda.</p>
        
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>4,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                        </svg>
                        <p class="flex-1">5,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-auto">100 Halaman</span>
                </div>
                {{-- bintang --}}
                
        
                <div class="mt-4 flex items-center justify-between">
                    <button class="text-white bg-[#557C55] hover:bg-[#446646] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Baca Sekarang</button>
                    <button class="text-gray-600 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Tambah ke MyBook</button>
                </div>
            </div>
        </div>
        <div class="max-w-sm mx-2 my-4 bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/800x400" alt="Product Image">
        
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Judul Buku</h2>
                <p class="text-gray-600 mt-2">Deskripsi singkat buku akan ditampilkan di sini. Anda dapat menambahkan lebih banyak teks sesuai kebutuhan Anda.</p>
        
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>4,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <svg class="w-auto h-3 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                        </svg>
                        <p class="flex-1">5,6 JT</p>
                    </span>
                    <span class="text-gray-500 ml-auto">100 Halaman</span>
                </div>
                {{-- bintang --}}
                
        
                <div class="mt-4 flex items-center justify-between">
                    <button class="text-white bg-[#557C55] hover:bg-[#446646] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Baca Sekarang</button>
                    <button class="text-gray-600 hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm">Tambah ke MyBook</button>
                </div>
            </div>
        </div>
        
    </div>

@endsection