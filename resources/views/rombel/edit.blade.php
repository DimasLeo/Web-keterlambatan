@extends('layouts.template')

@section('content')
<form action="{{ route('rombel.update', $rombels['id']) }}" method="post" class="card p-5">
@csrf
@method('PATCH')

@if ($errors->any())
<ul class="alert alert-danger p-3">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
    <div class="mb-3 grid items-center gap-3 pb-5">
        <label for="rombel" class="col-sm-2 col-form-label font-semibold text-xl">Ubah Rombel:</label>
        <div class="w-full">
            <input type="text" class="form-control" id="rombel" name="rombel" value="{{ $rombels['rombel'] }}">
        </div>
    </div>

    <div class="flex items-center justify-start gap-2 md:flex sm:flex">
        <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">Ubah Data</button>
        <button class="p-3 bg-yellow-500 text-white rounded-lg">
            <a href="{{ route('rombel.index') }}">Kembali</a>
        </button>
    </div>
    
</form>
@endsection
