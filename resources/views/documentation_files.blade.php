@extends('app')

@section('title','Documentation Files')

@section('content')

<div class="container mx-auto px-5 py-6">

    @if(session('success'))
        <div class="bg-green-100 border border-green-500 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-500 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded shadow p-6">

        <h2 class="text-2xl font-bold mb-5">
            Upload Dokumentasi
        </h2>

        <form action="{{ route('documentation.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Judul Dokumentasi
                </label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded p-2"
                    required>

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Upload File
                </label>

                <input
                    type="file"
                    name="file"
                    class="w-full border rounded p-2"
                    required>

            </div>

            <button
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">

                Upload

            </button>

        </form>

    </div>

    <div class="mt-10">

        <h2 class="text-2xl font-bold mb-5">

            Daftar Dokumentasi

        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($files as $file)

            <div class="border rounded shadow bg-white">

                <div class="p-4">

                    <h3 class="font-bold">

                        {{ $file->title }}

                    </h3>

                </div>

                @if(in_array(strtolower($file->file_type),['jpg','jpeg','png']))

                    <img
                        src="{{ asset('storage/'.$file->file_path) }}"
                        class="w-full h-60 object-cover">

                @elseif(strtolower($file->file_type)=='pdf')

                    <iframe
                        src="{{ asset('storage/'.$file->file_path) }}"
                        class="w-full h-60">
                    </iframe>

                @endif

                <div class="p-4 flex gap-2">

                    <a
                        href="{{ asset('storage/'.$file->file_path) }}"
                        target="_blank"
                        class="bg-green-600 text-white px-4 py-2 rounded">

                        Preview

                    </a>

                    <a
                        href="{{ asset('storage/'.$file->file_path) }}"
                        download
                        class="bg-blue-600 text-white px-4 py-2 rounded">

                        Download

                    </a>

                </div>

            </div>

            @empty

                <div class="text-gray-600">

                    Belum ada dokumentasi.

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection