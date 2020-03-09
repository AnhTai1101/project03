@extends('backend.master')
@section('title','Trang danh sach danh muc')
@section('main')
    <a href="{{ route('add-category') }}"><button style="margin: 10px;" class="btn badge-info">Thêm danh mục</button></a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Content</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        </tbody>
    </table>
@endsection