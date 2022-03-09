@extends('pegawai.dashboardpegawai')
@section('presensipegawai')
    <div class="content">
        <div>
            <h1>Presensi Pegawai</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('datapresensi') }}" method="post">
                @csrf
            <table class="table table-bordered">
                <tr>
                    <td>
                        <div>
                            <label for="jam_masuk">Jam Masuk</label>
                            <input type="time" class="form-control" style="width: 13%" id="jam_masuk"
                                name="jam_masuk">
                        </div>
                    </td>
                </tr>
                    <tr>
                        <td>
                            <div>
                                <label for="jam_pulang">Jam Pulang</label>
                                <input type="time" style="width: 13%" class="form-control" id="jam_pulang"
                                    name="jam_pulang">
                            </div>
                        </td>
                    </tr>
                </tr>
                <tr>
                    <td>
                    <div >
		            	<button type="submit" class="btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
@endsection
