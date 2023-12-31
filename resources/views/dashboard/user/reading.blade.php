@extends('dashboard.layout.main')

@section('container')
<div class="container mx-auto p-4">
    <div>
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-64 object-cover object-center" src="{{ $novel->gambar_novel ? asset('storage/uploads/' .$novel->gambar_novel) : 'https://via.placeholder.com/800x400' }}" alt="{{ $novel->nama_novel }}">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">{{ $novel->nama_novel }}</h2>
    
                {{-- Progres bar
                <div class="mt-4">
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-teal-600 bg-teal-200">
                                    Progres Membaca
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block text-teal-600">
                                    {{ $progresMembaca }}%
                                </span>
                            </div>
                        </div>
                        <div class="flex h-2 mb-4 overflow-hidden">
                            <div style="width:{{ $progresMembaca }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-teal-500"></div>
                        </div>
                    </div>
                </div> --}}
                <div class="mt-4 flex items-center">
                    <span class="text-gray-500 flex items-center">
                        <svg class="w-auto h-4 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                            </g>
                        </svg>
                        <p>{{ $novel->total_view_novel }}</p>
                    </span>
                    <span class="text-gray-500 ml-5 flex items-center">
                        <a href="{{ route('likeNovel', ['novelId' => $novel->id]) }}" onclick="event.preventDefault(); document.getElementById('like-form').submit();">
                            <svg class="w-auto h-5 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 19">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4C5.5-1.5-1.5 5.5 4 11l7 7 7-7c5.458-5.458-1.542-12.458-7-7Z"/>
                            </svg>
                        </a>
                        
                        <form id="like-form" action="{{ route('likeNovel', ['novelId' => $novel->id]) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <p class="flex-1">{{ $novel->total_like_novel }}</p>
                    </span>
                    <span class="text-gray-500 ml-auto">{{ $novel->jumlah_halaman_novel }} Halaman</span>
                </div>
                {{-- Konten novel --}}
                <div class="mt-4">
                    <div id="novel-content">
                        {!! $novel->deskripsi_novel !!}
                    </div>
                
                    {{-- <div class="mt-4 flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="prevBtn" onclick="changeParagraph(-1)">Back</button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="nextBtn" onclick="changeParagraph(1)">Next</button>
                    </div> --}}
                </div>
            
                {{-- Tombol "Kembali" --}}
                <a href="{{ route('home') }}" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-block">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection