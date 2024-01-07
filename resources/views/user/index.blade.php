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
    <a class="p-3 rounded-lg text-white bg-green-500" href="{{ route('user.create') }}">Tambah Data</a>
</div>

<div class="overflow-x-auto">
    <table class="w-full border border-collapse text-left">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($user as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $no++ }}</td>
                    <td class="border px-4 py-2">{{ $item['name'] }}</td>
                    <td class="border px-4 py-2">{{ $item['email'] }}</td>
                    <td class="border px-4 py-2">{{ $item['role'] }}</td>
                    <td class="border px-4 py-2 flex flex-col md:flex-row items-center justify-center md:justify-start gap-2">
                        <a href="{{ route('user.edit', $item['id']) }}" class="p-3 rounded-lg text-white bg-blue-500">Edit</a>

                        <form action="{{ route('user.delete', $item['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-3 rounded-lg text-white bg-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
