@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow p-8 max-w-4xl mx-auto">
    @if($memorial->foto)
        <img src="{{ asset('storage/' . $memorial->foto) }}"
             class="w-full max-h-[500px] object-cover rounded-xl mb-6">
    @endif

    <h2 class="text-4xl font-bold mb-2">{{ $memorial->nama }}</h2>
    <p class="text-gray-500">{{ $memorial->hubungan }}</p>

    <p class="inline-block bg-rose-100 text-rose-600 px-3 py-1 rounded-full mt-2 mb-4">
        {{ $memorial->status }}
    </p>

    @if($memorial->tanggal_dibuat)
        <p class="text-gray-400 mb-6">
            📅 {{ \Carbon\Carbon::parse($memorial->tanggal_dibuat)->format('d F Y') }}
        </p>
    @endif

    <h3 class="text-xl font-semibold mb-2">Cerita Kenangan</h3>
    <p class="text-gray-700 whitespace-pre-line mb-6">
        {{ $memorial->cerita }}
    </p>

    @if($memorial->doa)
        <h3 class="text-xl font-semibold mb-2">Doa dan Harapan</h3>
        <p class="text-gray-700 whitespace-pre-line mb-6">
            {{ $memorial->doa }}
        </p>
    @endif

    <div class="mt-6">
        <a href="{{ route('memorials.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Kembali
        </a>
    </div>
</div>
@endsection