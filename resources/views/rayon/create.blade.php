@extends('layouts.template')

@section('content')
<form action="{{ route('rayon.store') }}" method="post" class="card p-5">
    @csrf

    @if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $erros)
                <li>{{ $erros }}</li>
            @endforeach
        </ul>
    @endif

<div class="mb-3 grid items-center gap-3 pb-5">
    <label for="rayon" class="col-sm-2 col-form-label font-semibold">Rayon : </label>
    <div class="w-full">
        <input type="text" class="form-control" id="rayon" name="rayon">
    </div>

    <label for="user_id" class="col-sm-2 col-form-label font-semibold">Pembimbing Siswa : </label>
    <div class="mb-3 row">
        <select class="form-control select2 select2-purple" name="user_id" id="user_id">
            <option selected disabled>Pilih PS :</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>  
</div>

<button type="submit" class="p-2 bg-blue-500 text-white rounded-lg">
    <a href="{{ route('rayon.index')}}">Tambah Data</a>
</button>
</form>
@endsection
