@extends('dashboard.layout.main')
@extends('dashboard.layout.aside')

@section('container')
    <div class="text-center">
        <button class="flex items-center text-white bg-yellow-900 hover:bg-yellow-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-yellow-900 dark:hover:bg-yellow-400 focus:outline-none dark:focus:bg-yellow-900" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
            menu
        </button>
    </div>
    <div class="py-8 px-6 mx-auto max-w-screen-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Novel</h2>
        <form action="{{ route('updateWriteEdit', ['id' => $novel->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="nama_novel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                    <input type="text" name="nama_novel" id="nama_novel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $novel->nama_novel }}" required="">
                    @if ($errors->has('nama_novel'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('nama_novel') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar_novel">Upload file</label>
                    @if ($novel->gambar_novel)
                        <img src="{{ asset('storage/uploads/' . $novel->gambar_novel) }}" alt="Novel Image" class="mb-2 max-w-full h-auto">
                    @endif
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="gambar_novel" id="gambar_novel" type="file" name="gambar_novel">
                    @if ($errors->has('gambar_novel'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('gambar_novel') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="kateogri" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kategori</label>
                    <select id="id_kategori" name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kategori</option>
                        @foreach ($kategori as $id => $category)
                            <option value="{{ $id }}" {{ $id == $novel->id_kategori ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_kategori'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('id_kategori') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="deskripsi_novel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi novel</label>
                    <input id="deskripsi_novel" type="hidden" name="deskripsi_novel" value="{{ old('deskripsi_novel', $novel->deskripsi_novel ?? '') }}">
                    <trix-editor data-trix-editor data-trix-content-type="text/html" input="deskripsi_novel"></trix-editor>
                    @if ($errors->has('deskripsi_novel'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('deskripsi_novel') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="jumlah_halaman_novel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman_novel" id="jumlah_halaman_novel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $novel->jumlah_halaman_novel }}" required="">
                    @if ($errors->has('jumlah_halaman_novel'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('jumlah_halaman_novel') }}</p>
                    @endif
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-900 rounded-lg focus:ring-4 focus:ring-yellow-200 dark:focus:ring-yellow-900 hover:bg-yellow-400">
                Edit Novel
            </button>
        </form>
    </div>

@endsection