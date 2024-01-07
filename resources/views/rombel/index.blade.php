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
    <a class="p-3 rounded-lg text-white bg-green-500" href="{{ route('rombel.create') }}">Tambah Data</a>
</div>

<table class="w-full border border-collapse text-left">
    <thead>
        <tr class="bg-gray-200">
            <th  class="border px-4 py-2">No</th>
            <th  class="border px-4 py-2">Nama Rombel</th>
            <th  class="border px-4 py-2 text-center"> 
                Aksi
            </th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($rombels as $item)
            <tr>
                <td  class="border px-4 py-2">{{ $no++ }}</td>
                <td  class="border px-4 py-2">{{ $item['rombel'] }}</td>
                <td  class="border px-4 py-2 flex justify-center gap-2">
                    <a href="{{ route('rombel.edit', $item['id']) }}" class="p-3 rounded-lg text-white bg-blue-500">Edit</a>
                    <form action="{{ route('rombel.delete', $item['id']) }}" method="post">
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
