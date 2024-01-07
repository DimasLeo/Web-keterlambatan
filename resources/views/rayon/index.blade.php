@extends('layouts.template')

@section('content')
    <div id="msg-success"></div>

@if (Session::get('success'))
    <div class="alert alert-success"> {{ Session::get('success') }}</div>
@endif
@if (Session::get('deleted'))
    <div class="alert alert-warning"> {{ Session::get('deleted') }}</div>
@endif

<div style="margin-bottom: 15px; justify-content: flex-end; display: flex;">
    <a class="p-3 rounded-lg text-white bg-green-500" href="{{ route('rayon.create') }}">Tambah Data</a>
</div>

<table class="w-full border border-collapse text-left">
    <thead>
        <tr class="bg-gray-200">
            <th>no</th>
            <th  class="border px-4 py-2">Rayon</th>
            <th  class="border px-4 py-2">Pembimbing Siswa</th>
            <th  class="border px-4 py-2 text-center"> 
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($rayons as $item)
            <tr>
                <td  class="border px-4 py-2">{{ $no++ }}</td>
                <td  class="border px-4 py-2">{{ $item['rayon'] }}</td>
                <td  class="border px-4 py-2">
                    @foreach ($users as $user)
                        @if ($user->id == $item->user_id)
                            {{ $user->name }}
                        @endif
                    @endforeach
                </td>
                <td  class="border px-4 py-2 flex justify-center gap-2">
                    <a href="{{ route('rayon.edit', $item['id']) }}" class="p-3 rounded-lg text-white bg-blue-500">Edit</a>
                    <form action="{{ route('rayon.delete', $item['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-3 rounded-lg text-white bg-red-500">Hapus</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
