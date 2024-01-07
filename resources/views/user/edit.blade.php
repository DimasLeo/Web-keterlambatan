@extends('layouts.template')

@section('content')
<form action="{{ route('user.update', $user['id']) }}" method="post" class="card p-5">
@csrf
@method('PATCH')

@if ($errors->any())
<ul class="alert alert-danger p-3">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label font-semibold text-xl">Ubah Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label font-semibold text-xl">Ubah Email :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>
    </div>

      <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label font-semibold text-xl">Ubah Role :</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control select2 select2-purple">
                <option selected disabled hidden>Pilih</option>
                <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="ps" {{ $user['role'] == 'cashier' ? 'selected' : '' }}>PS</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label font-semibold text-xl">Ubah Password Anda? :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" >
        </div>
    </div>

    <div class="flex items-center justify-start gap-2 md:flex sm:flex">
        <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">Ubah</button>
        <button class="p-3 bg-yellow-500 text-white rounded-lg">
            <a href="{{ route('user.index') }}">Kembali</a>
        </button>
    </div>
</form>
@endsection
