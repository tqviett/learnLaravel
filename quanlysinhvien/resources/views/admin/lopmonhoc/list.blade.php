@extends('admin.main')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Mô tả</th>
                <th>Số lượng SV</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach($lopmonhocs as $lopmonhoc)
                <tr>
                    <td>{{$lopmonhoc->id}}</td>
                    <td>{{$lopmonhoc->MaLop}}</td>
                    <td>{{$lopmonhoc->TenLop}}</td>
                    <td>{!! $lopmonhoc->MoTa !!}</td>
                    <td>{{$lopmonhoc->SoLuongSV}}</td>
                    

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lopmonhocs->links() }}
@endsection
