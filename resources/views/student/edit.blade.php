
@extends('layouts.template')
@section('content')
        <form action="{{ route('student.edit', $students['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')
          <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold">NIS</label>
                <input type="integer" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis', $students->nis) }}" placeholder="Masukkan nis">
                @error('nis')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold">NAMA</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $students->name) }}" placeholder="Masukkan name">
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
              <label>Rayon</label>
              <select class="form-control select2 select2-purple @error('rayon_id') is-invalid @enderror" data-dropdown-css-class="select2-danger" style="width: 100%;" name="rayon_id">
              @foreach ($rayons as $rayon)

                <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                    
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
        <div class="flex items-center gap-2 md:flex sm:flex">
          <button type="submit" class="p-3 bg-blue-500 text-white rounded-lg">
            <a href="{{ route('student.index') }}">Ubah Data</a>
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