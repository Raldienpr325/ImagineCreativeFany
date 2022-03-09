@extends('admin.dashboardadmin')
@section('listpegawai')
    <div class="content">
        <div>
            <h1>LIST PEGAWAI</h1>
        </div>
        <div class="card card-info card-outline">
            <div class="card-header">
                <a href="{{ url('registerpegawai') }}" class="btn btn-success">Tambah Akun</a>
                {{-- <a href="{{ url('export-vote') }}" class="btn btn-warning"> Export</a> --}}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>action</th>
                </tr>
                @foreach ($datapegawai as $item)
                    <tr>
                        <td>{{ $item->nip }} </td>
                        <td>{{ $item->nama_lengkap }} </td>
                        {{-- <td>   
                            <img src="{{ asset('storage/'. $item->foto) }}" style="max-height: 140px">
                        </td> --}}
                        <td>{{ "$item->jenis_kelamin" }}</td>
                        <td>{{ "$item->tanggal_lahir" }}</td>
                        <td>
                            <a href="{{ url('deletepegawai', $item->id)}}"> <button
                                    class="btn btn-danger">delete</button></a>
                            <a href="{{ url('updatepegawai', $item->id) }}"> <button
                                    class="btn btn-warning">update</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
