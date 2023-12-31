@extends('dashboard.admin.layout.main')

@section('content')
    <div class="relative overflow-x-auto sm:rounded-lg max-w-2xl">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Novel</h2>
        <form action="{{ route('novelStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="nama_novel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                    <input type="text" name="nama_novel" id="nama_novel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ketik nama user" required="">
                    @if ($errors->has('nama_novel'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('nama_novel') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar_novel">Upload file</label>
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
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_kategori'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('id_kategori') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="deskripsi_novel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskrisi novel</label>
                    <input id="deskripsi_novel" type="hidden" name="deskripsi_novel" value="{{ old('deskripsi_novel') }}">
                    <trix-editor input="deskripsi_novel"></trix-editor>
                    @if ($errors->has('deskripsi_novel'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('deskripsi_novel') }}</p>
                    @endif
                </div>
                <div class="sm:col-span-2">
                    <label for="jumlah_halaman_novel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman_novel" id="jumlah_halaman_novel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan jumlah halaman" required="">
                    @if ($errors->has('jumlah_halaman_novel'))
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('jumlah_halaman_novel') }}</p>
                    @endif
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-900 rounded-lg focus:ring-4 focus:ring-yellow-500 dark:focus:ring-primary-900 hover:bg-yellow-500">
                Tambahkan Novel
            </button>
        </form>
    </div>
@endsection
