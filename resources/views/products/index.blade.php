@extends('layouts.app')

<!-- Bao gồm Bootstrap CSS -->

<!-- Bao gồm Bootstrap JavaScript và jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@section('content')


<div class="container">
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm mới</a>
    <h2>Danh sách sản phẩm</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-2">
                <div class="card" style="height: 400px">
                    <img src="{{ asset('build/assets/images/' . $product->img) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body" style="height: 350px">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Giá: {{ $product->price }}</p>
                        {{-- <p class="card-text">Ghi chú: {{ $product->ghi_chu }}</p> --}}

                    </div>
                    <div class="card-body">
                        <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-primary">Sửa</a>
                        <a href="{{ route('products.destroy', ['id' => $product->id]) }}" class="btn btn-danger">Xóa</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    {{ $products->links() }} <!-- Hiển thị phân trang -->
</div>
@endsection
