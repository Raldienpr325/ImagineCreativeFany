@extends('admin.dashboardadmin')
@section('editadmin')
    <div class="content">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>action</th>
                </tr>
                @foreach ($dataadmin as $item)
                <form action="{{ url('updateadmin', $item->id)}}" method="post">
                    @csrf
                    <tr>
                        <td>
                            <div>
                                <input type="text" class="form-control" value="{{ $item->id }}" id="id"
                                    name="id" readonly>
                            </div>
                        </td>
                        <td>
                            <div>
                                <input type="text" class="form-control" value="{{ $item->email }}" id="nama"
                                    name="email">
                            </div>
                        </td>
                        <td> 
                            <div>
                                <input type="text" class="form-control" value="{{ $item->nama_lengkap }}" id="nama"
                                    name="nama_lengkap">
                            </div>
                        </td>
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
