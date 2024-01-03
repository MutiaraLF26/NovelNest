@extends('dashboard.layout.main')

@section('container')
    <div class="min-h-screen bg-gray-100 p-3 relative">
        <div class="w-96 mx-auto" style="scroll-snap-type: x mandatory;">
            @forelse ($novels as $index => $novel)
                <div class="{{ $index === 0 ? 'peer-checked' : '' }}">
                    <input class="sr-only peer" type="radio" name="carousel" id="carousel-{{ $index + 1 }}" {{ $index === 0 ? 'checked' : '' }} />

                    <a href="{{ $novel['volumeInfo']['previewLink'] ?? '#' }}" target="_blank" class="w-96 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white rounded-lg shadow-lg transition-all duration-300 opacity-0 peer-checked:opacity-100 peer-checked:z-10 z-0">
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
    </div>
    

@endsection