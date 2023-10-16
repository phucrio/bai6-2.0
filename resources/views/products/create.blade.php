@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <h3>Thêm sản phẩm</h3>
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Danh mục</label>
                <input type="text" name="category" id="category" class="form-control">
            </div>
            <div class="form-group">
                <label for="don_vi">Đơn vị</label>
                <input type="text" name="don_vi" id="don_vi" class="form-control">
            </div>
            <div class="form-group">
                <label for="kich_thuoc">Kích thước</label>
                <input type="text" name="kich_thuoc" id="kich_thuoc" class="form-control">
            </div>
            <div class="form-group">
                <label for="mau_sac">Màu sắc</label>
                <input type="text" name="mau_sac" id="mau_sac" class="form-control">
            </div>





        <!-- Thêm các trường khác ở đây -->
            <div class="form-group">
                <label for="img">Ảnh sản phẩm</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            {{-- <div class="form-group">
                <label for="ghi_chu">Ghi chú</label>
                <input type="text" name="ghi_chu" id="ghi_chu" class="form-control">
            </div> --}}

            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>

@endsection
