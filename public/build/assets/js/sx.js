// Tạo các hàm JavaScript để gửi yêu cầu AJAX
function new2old() {
    sortProducts('new2old');
}

function old2new() {
    sortProducts('old2new');
}

function low2high() {
    sortProducts('low2high');
}

function high2low() {
    sortProducts('high2low');
}

// Hàm gửi yêu cầu AJAX
function sortProducts(sortBy) {
    // Gửi yêu cầu đến các phương thức trong Laravel bằng AJAX
    $.ajax({
        url: '/sort-products',
        type: 'GET',
        data: { sortBy: sortBy },
        success: function (data) {
            // Cập nhật danh sách sản phẩm trên trang
            $('#product-list').html(data);
        }
    });
}
