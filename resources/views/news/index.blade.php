<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Tin Tức</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
    <!-- Đối với upload ảnh, bạn cần thêm các thư viện CSS và JS tương ứng -->
</head>
<body>


<div class="container">
    <h1>Quản Lý Tin Tức</h1>
    <a href="{{ route('news.create') }}" class="btn btn-primary">Thêm tin tức mới</a>
    <p></p>
    <div class="row">
        @foreach ($all_news as $news)
            <div class="col-md-3">
                <div class="card" style="height: 500px">
                    <img src="{{ asset('build/assets/images/' . $news->news_img) }}" class="card-img-top" style="height: 250px" alt="{{ $news->news_title }}">
                    <div class="card-body" >
                        <h5 class="card-title">{{ $news->news_title }}</h5>
                        <p class="card-text">{{ $news->news_date }}</p>

                    </div>
                    <div class="card-body">
                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa tin tức này?')">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="{{ asset('build/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
