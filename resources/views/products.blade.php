<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/product.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('build/assets/js/sx.js') }}"></script>

</head>
<body>

    @include('blocks.header')
    @include('blocks.navbar')
    @include('blocks.product')
    <div class="ta-product">
        <div class="ta-product__top">
            <h1 class="ta-product__title">Danh Sách Sản Phẩm</h1>
            <div class="arrange shadow-sm">
                <div class="arrange-title">Sắp xếp</div>
                <a class="arrange-link active" href="{{ route('new2old') }}">Mới nhất</a>
                <a class="arrange-link" href="{{ route('old2new') }}">Cũ nhất</a>
                <a class="arrange-link" href="{{ route('low2high') }}">Giá: Thấp - Cao</a>
                <a class="arrange-link" href="{{ route('high2low') }}">Giá: Cao - Thấp</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($all_products as $product)
                    <div class="col-3 ta-product__col">
                        <a href="{{ route('products.show',$product->id) }}" style="text-decoration: none">
                            <img src="{{ asset('build/assets/images/' . $product->img) }}" alt="{{ $product->name }}" class="ta-product__img">
                            <div class="ta-product__name">{{ $product->name }}</div>
                            <div class="ta-product__price">{{ $product->price }} VND</div>
                        </a>
                    </div>

                    @if ($loop->iteration % 5 == 0)
                        </div> <!-- Đóng hàng khi đã hiển thị 5 sản phẩm -->
                        <div class="row"> <!-- Bắt đầu hàng mới -->
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @include('blocks.footer')
    <script src="{{ asset('build/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/main.js') }}"></script>
</body>
</html>
