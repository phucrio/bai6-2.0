<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tạo Tin Tức Mới</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
    <!-- Đối với upload ảnh, bạn cần thêm các thư viện CSS và JS tương ứng -->
</head>
<body>


<div class="container">
    <h1>Tạo Tin Tức Mới</h1>
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="news_date">Ngày:</label>
            <input type="date" name="news_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="news_title">Tiêu đề:</label>
            <input type="text" name="news_title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="news_img">Ảnh:</label>
            <input type="file" name="news_img" class="form-control" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="news_content">Nội dung:</label>
            <textarea name="news_content" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tạo Tin Tức</button>
    </form>
</div>

<script src="{{ asset('build/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
