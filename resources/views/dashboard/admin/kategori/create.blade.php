@extends('dashboard.admin.layout.main')

@section('content')
    <div class="relative overflow-x-auto sm:rounded-lg max-w-2xl">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah kategori</h2>
        <form action="{{ route('storeKategori') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ketik nama kategori" required="">
                    @if ($errors->has('nama_kategori'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('nama_kategori') }}</p>
                    @endif
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar_kategori">Upload file</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="gambar_kategori" id="gambar_kategori" type="file" name="gambar_kategori">
                @if ($errors->has('gambar_kategori'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('gambar_kategori') }}</p>
                @endif
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-900 rounded-lg focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-300 hover:bg-yellow-500">
                Tambahkan kategori
            </button>
        </form>
    </div>
@endsection
