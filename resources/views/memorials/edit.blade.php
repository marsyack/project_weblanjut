@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow p-8">
    <h2 class="text-3xl font-bold mb-6">Edit Kenangan</h2>

    <form action="{{ route('memorials.update', $memorial) }}"
          method="POST"
          enctype="multipart/form-data">
        @method('PUT')
        @include('memorials.form')
    </form>
</div>
@endsection