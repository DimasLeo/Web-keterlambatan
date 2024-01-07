@extends('layouts.template')

@section('content')
<form action="{{ route('rayon.update', $rayons['id']) }}" method="post" class="card p-5">
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
    <label for="rayon" class="col-sm-2 col-form-label font-semibold text-xl">Ubah Rayon :</label>
    <div class="w-full">
        <input type="text" class="form-control" id="rayon" name="rayon" value="{{ $rayons['rayon'] }}">
    </div>
    </div>
    <div class="mb-3 row grid items-center gap-3 pb-5">
        <label for="user_id" class="col-sm-2 col-form-label font-semibold text-xl">Ubah Nama PS :</label>
        <div class="col-sm-10">
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="{{ $rayons['user_id']}}"></option>
                @foreach ($users as $item)
                    <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex items-center justify-start gap-2 md:flex sm:flex">
        <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">Ubah Data</button>
        <button class="p-3 bg-yellow-500 text-white rounded-lg">
            <a href="{{ route('rayon.index') }}">Kembali</a>
        </button>
    </div>
</form>
@endsection
