<header class="container header">
    <div class="logo">
        <img src="{{asset('build/assets/images/logo.png')}}" alt="">
    </div>
    <form action="{{ route('search') }}" method="GET" class="search">
        <input name="searchQuery" placeholder="Bạn muốn tìm gi?" class="search-input" type="text">
        <input class="search-btn" type="submit" value="Tìm kiếm">
    </form>
    <div class="translate">
        <a href="#" class="translate translate-vn">VN /</a>
        <a href="#" class="translate translate-en">EN</a>
    </div>
</header>
