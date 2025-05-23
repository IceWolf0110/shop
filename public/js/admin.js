$(document).ready(function(){
    // Khi người dùng click vào "Quản lý sản phẩm"
    $('#manage-products').on('click', function(){
        // Chuyển nội dung trong phần #content
        $('#content').html('<h2>Danh sách sản phẩm</h2><table border="1"><thead><tr><th>ID</th><th>Tên sản phẩm</th><th>Giá</th><th>Hành động</th></tr></thead><tbody><tr><td>1</td><td>Sản phẩm A</td><td>100,000 VND</td><td><a href="#">Sửa</a> | <a href="#">Xóa</a></td></tr><tr><td>2</td><td>Sản phẩm B</td><td>200,000 VND</td><td><a href="#">Sửa</a> | <a href="#">Xóa</a></td></tr></tbody></table>');
    });

    // Khi người dùng click vào các menu khác
    $('#manage-orders').on('click', function(){
        $('#content').html('<h2>Danh sách đơn hàng</h2><p>Danh sách các đơn hàng sẽ hiển thị ở đây.</p>');
    });

    $('#manage-users').on('click', function(){
        $('#content').html('<h2>Danh sách người dùng</h2><p>Danh sách người dùng sẽ hiển thị ở đây.</p>');
    });

    $('#sales-report').on('click', function(){
        $('#content').html('<h2>Báo cáo doanh thu</h2><p>Thông tin báo cáo doanh thu sẽ hiển thị ở đây.</p>');
    });
});
const totalOrders = <?php echo json_encode($totalOrders); ?>;
                const totalProducts = <?php echo json_encode($totalProducts); ?>;
                const totalUsers = <?php echo json_encode($totalUsers); ?>;
                const totalRevenue = <?php echo json_encode($totalRevenue); ?>;

                // Biểu đồ cột
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Đơn hàng', 'Tổng sản phẩm', 'Người dùng', 'Doanh thu'],
                        datasets: [{
                            label: 'Số liệu tổng quan',
                            data: [totalOrders, totalProducts, totalUsers, totalRevenue],
                            backgroundColor: ['#FF5733', '#FFC300', '#28B463', '#3498DB'],
                            borderColor: ['#FF5733', '#FFC300', '#28B463', '#3498DB'],
                            borderWidth: 1,
                            hoverBackgroundColor: ['#FF6F61', '#FFB533', '#33B57F', '#5DADE2']
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        },
                    }
                });
