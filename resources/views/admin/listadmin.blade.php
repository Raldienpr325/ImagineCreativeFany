@extends('admin.dashboardadmin')
@section('listadmin')
    <div class="content">
        <div>
            <h1>LIST ADMIN</h1>
        </div>
        <div class="card card-info card-outline">
            <div class="card-header">
                <a href="{{ url('adminregister') }}" class="btn btn-success">Tambah Akun</a>
                {{-- <a href="{{ url('export-vote') }}" class="btn btn-warning"> Export</a> --}}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Waktu Dibuat</th>
                    <th>Waktu Diedit</th>
                    <th>action</th>
                </tr>
                @foreach ($dataadmin as $item)
                    <tr>
                        <td>{{ $item->email }} </td>
                        <td>{{ $item->nama_lengkap }} </td>
                        {{-- <td>   
                            <img src="{{ asset('storage/'. $item->foto) }}" style="max-height: 140px">
                        </td> --}}
                        <td>{{ "$item->created_at" }}</td>
                        <td>{{ "$item->updated_at" }}</td>
                        <td>
                            <a href="{{ url('deleteadmin', $item->id)}}"> <button
                                    class="btn btn-danger">delete</button></a>
                            <a href="{{ url('editadmin', $item->id) }}"> <button
                                    class="btn btn-warning">update</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
