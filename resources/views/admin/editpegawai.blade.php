@extends('admin.dashboardadmin')
@section('editpegawai')
    <div class="content">
        {{-- <div class="card card-info card-outline">
            <div class="card-header">
                <a href="{{ url('adminregister') }}" class="btn btn-success">Tambah Akun</a>
                <a href="{{ url('export-vote') }}" class="btn btn-warning"> Export</a>
            </div>
        </div> --}}
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
                <form action="{{ url('updatepegawaifix', $item->id)}}" method="post">
                    @csrf
                    <tr>
                        <td>
                            <div>
                                {{-- <label for="email">Email</label> --}}
                                <input type="text" class="form-control" value="{{ $item->nip }}" id="nip"
                                    name="nip">
                            </div>
                        </td>
                        <td>
                            <div>
                                {{-- <label for="email">Email</label> --}}
                                <input type="text" class="form-control" value="{{ $item->nama_lengkap }}" id="nama_lengkap"
                                    name="nama_lengkap">
                            </div>
                        </td>
                        <td> 
                            <div>
                                {{-- <label for="email">Email</label> --}}
                                <input type="text" class="form-control" value="{{ $item->jenis_kelamin }}" id="jenis_kelamin"
                                    name="jenis_kelamin">
                            </div>
                        </td>
                        <td> 
                            <div>
                                {{-- <label for="email">Email</label> --}}
                                <input type="text" class="form-control" value="{{ $item->tanggal_lahir }}" id="tanggal_lahir"
                                    name="tanggal_lahir">
                            </div>
                        </td>
                        {{-- <td>   
                            <img src="{{ asset('storage/'. $item->foto) }}" style="max-height: 140px">
                        </td> --}}
                        <td>
                            <input type="submit" value="Update" class="btn btn-primary">
                        </td>
                    </tr>
                </form>
                @endforeach
            </table>
        </div>
    </div>
@endsection
