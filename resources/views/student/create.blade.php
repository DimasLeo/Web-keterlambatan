
@extends('layouts.template')
@section('content')
        <form action="{{ route('student.store') }}" method="POST" class="card p-5">
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
            <div class="card-body">
                <div class="form-group">
                    <label>NIS</label>
                    <input type="integer" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" placeholder="Masukkan Nis anda">
                    @error('nis')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NAMA</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama anda">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control select2 select2-purple @error('rayon_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="rayon_id" placeholder="Masukkan Role">
                        @foreach ($rayons as $item)
                        <option value="{{ $item->id }}">{{ $item->rayon }}</option>
                        @endforeach
                    </select>
                    @error('rayon_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Rombel</label>
                    <select class="form-control select2 select2-purple @error('rombel_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="rombel_id">
                        @foreach ($rombels as $rombel)
                        <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                        @endforeach
                    </select>
                    @error('rombel_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="flex items-center gap-2 md:flex sm:flex">
                <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">
                    Buat
                </button>
                <button class="p-3 bg-yellow-500 text-white rounded-lg">
                    <a href="{{ route('student.index') }}">Kembali</a>
                </button>
            </div>
        </form>
    </div>
    <!-- /.content -->
</div>
@endsection