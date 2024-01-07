@extends('layouts.template')

@section('content')
<form action="{{ route('user.daftar') }}" method="post" class="card p-5">
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

<div class="mb-3 grid items-center gap-3 pb-3">
    <label for="name" class="col-sm-2 col-form-label">Nama Anda : </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name">
    </div>
</div>
<div class="mb-3 grid items-center gap-3 pb-3">
    <label for="email" class="col-sm-2 col-form-label">Email Anda : </label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="email" name="email">
    </div>
</div>
<div class="mb-3 grid items-center gap-3 pb-3">
    <label for="role" class="col-sm-2 col-form-label">Role Anda : </label>
    <div class="col-sm-10">
        <select class="form-control select2 select2-purple" name="role" id="role">
            <option selected disabled hidden>Pilih</option>
            <option value="admin">Admin</option>
            <option value="ps">Pembimbing Siswa</option>
        </select>
    </div>
</div>

<div class="flex items-center gap-2 md:flex sm:flex">
    <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">Buat Data</button>
    <button class="p-3 bg-yellow-500 text-white rounded-lg">
        <a href="{{ route('user.index') }}">Kembali</a>
    </button>
</div>
</form>
@endsection
