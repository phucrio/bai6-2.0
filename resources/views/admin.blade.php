@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Trang Admin</h2>

    <ul>
        <li><a href="{{ route('admin.quanlisp') }}">Quản lý sản phẩm</a></li>
        <li><a href="{{ route('admin.quanlinews') }}">Quản lý tin tức</a></li>
    </ul>
</div>
@endsection
