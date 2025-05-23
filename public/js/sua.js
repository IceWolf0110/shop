// Khi nhấn vào nút "Sửa", mở modal và điền thông tin vào các trường
function editProduct(productId) {
    // Gọi Ajax để lấy dữ liệu sản phẩm từ cơ sở dữ liệu
    $.ajax({
        url: 'get_product.php', // Tạo một file PHP để lấy thông tin sản phẩm
        type: 'GET',
        data: {id: productId},
        success: function(response) {
            const product = JSON.parse(response);
            // Điền dữ liệu vào các ô input trong modal
            $('#productId').val(product.id);
            $('#productName').val(product.name);
            $('#productPrice').val(product.price);
            $('#productSize').val(product.size);
            $('#productQuantity').val(product.quantity);
            $('#oldImage').val(product.image); // Giữ lại ảnh cũ nếu không thay đổi ảnh

            // Hiển thị modal
            $('#editModal').show();
        }
    });
}

// Đóng modal khi click vào nút đóng (x)
$('.close').click(function() {
    $('#editModal').hide();
});

// Xử lý khi submit form sửa sản phẩm
$('#editProductForm').submit(function(e) {
    e.preventDefault(); // Ngừng hành động mặc định của form

    // Tạo FormData để gửi dữ liệu (cả ảnh nếu có)
    const formData = new FormData(this);

    $.ajax({
        url: 'update_product.php', // Tạo file PHP để cập nhật thông tin sản phẩm
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            alert('Sản phẩm đã được cập nhật!');
            location.reload(); // Tải lại trang để xem thay đổi
        }
    });
});
