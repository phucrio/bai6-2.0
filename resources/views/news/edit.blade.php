<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh Sửa Tin Tức</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
    <!-- Đối với upload ảnh, bạn cần thêm các thư viện CSS và JS tương ứng -->
</head>
<body>

<div class="container">
    <h1>Chỉnh Sửa Tin Tức</h1>
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="news_date">Ngày:</label>
            <input type="date" name="news_date" class="form-control" value="{{ $news->news_date }}" required>
        </div>
        <div class="form-group">
            <label for="news_title">Tiêu đề:</label>
            <input type="text" name="news_title" class="form-control" value="{{ $news->news_title }}" required>
        </div>
        <div class="form-group">
            <label for="news_img">Ảnh:</label>
            <input type="file" name="news_img" class="form-control" accept="image/*">
        </div>
        @if ($news->news_img)
            <img src="{{ asset('build/assets/images/' . $news->news_img) }}" alt="Current Image" class="current-image">
        @endif
        <div class="form-group">
            <label for="news_content">Nội dung:</label>
            <textarea name="news_content" class="form-control" rows="4" required>{{ $news->news_content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu Tin Tức</button>
    </form>
</div>


<script src="{{ asset('build/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
