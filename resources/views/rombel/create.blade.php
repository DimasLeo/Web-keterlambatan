@extends('layouts.template')

@section('content')
<form action="{{ route('rombel.store') }}" method="post" class="card p-5">
    @csrf

    @if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
    <ul class="alert alert-danger p-3">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

<div class="mb-3 grid items-center gap-3 pb-5">
    <label for="rombel" class="col-sm-2 col-form-label font-semibold text-2xl">Buat Rombel : </label>
    <div class="w-full">
        <input type="text" class="form-control" id="rombel" name="rombel">
    </div>
</div>

<div class="flex items-center justify-start gap-2 md:flex sm:flex">
    <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">
        Buat
    </button>
    <button class="p-3 bg-yellow-500 text-white rounded-lg">
        <a href="{{ route('rombel.index') }}">Kembali</a>
    </button>
</div>
</form>
@endsection
