@extends('pegawai.dashboardpegawai')
@section('listpresensi')
    <div class="content">
        <div>
            <h1>LIST PEGAWAI</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                </tr>
                @foreach ($datapresensi as $item)
                    <tr>
                        <td>{{ "$item->jam_masuk" }}</td>
                        <td>{{ "$item->jam_pulang" }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
