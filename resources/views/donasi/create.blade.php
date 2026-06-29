```php
@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="page-title">
        Form Donasi
    </h1>

    <div class="card shadow p-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('donasi.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Pilih Campaign</label>

                <select name="campaign_id"
                        class="form-control">

                    @foreach($campaigns as $campaign)

                    <option value="{{ $campaign->id }}">
                        {{ $campaign->title }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Nominal Donasi</label>

                <input type="number"
                       name="amount"
                       class="form-control">

            </div>

            <button class="btn btn-success">
                Donasi Sekarang
            </button>

        </form>

    </div>

</div>

@endsection
```
