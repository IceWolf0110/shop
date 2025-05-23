@extends('layout')

@section('content')
    <div class="container mt-5 product-detail-wrapper">
        <div class="row gx-5 align-items-start">
            <!-- ảnh sản phẩm -->
            @php
                $image_main = $product->image;
                $image_alt = str_replace('.png', 'b.png', $image_main);
            @endphp

            <div class="col-md-6">
                <div class="product-gallery text-center">
                    <div class="image-viewer position-relative">
                        <button class="nav-btn left" onclick="prevImage()">&#10094;</button>
                        <img id="mainImage" src="images/{{ $image_main }}" class="main-img">
                        <button class="nav-btn right" onclick="nextImage()">&#10095;</button>
                    </div>

                    <div class="thumbnail-row mt-3 d-flex justify-content-center gap-2">
                        <img class="thumb-img active-thumb" src="images/{{ $image_main }}" onclick="setImage(0)">
                        <img class="thumb-img" src="{{ $image_alt }}" onclick="setImage(1)">
                    </div>
                </div>
            </div>
        </div>

        <!-- Cột phải: Thông tin sản phẩm -->
        <div class="col-md-6 product-info ms-4">
            <h2 class="mb-3">{{ $product->name }}</h2>

            @php
                $price = $product->price;
                $discount = $product->discount ?? 0;
                $final_price = $discount > 0 ? $price - ($price * $discount / 100) : $price;

                $priceConverted = number_format($price, 0, ',', '.');
                $finalPriceConverted = number_format($final_price, 0, ',', '.');

                $sizes = isset($product['sizes']) ? explode(',', $product['sizes']) : ['S', 'M', 'L', 'XL'];
            @endphp

            <p class="fs-5 fw-semibold text-danger">
                {{ $finalPriceConverted }}₫
            </p>

            @if ($discount > 0)
                <p class="text-muted">
                    <del>{{ $priceConverted }}₫</del> (-{{ $discount }}>%)
                </p>
            @endif

            <p class="text-muted">{{ $product->description }}</p>

            <!-- Chọn kích thước -->
            <div class="sizes mb-3">
                <label class="form-label">Kích thước:</label>
                <div class="d-flex gap-2 flex-wrap">
                    @foreach ($sizes as $size)
                        @php
                            $stock = $stockBySize[$size] ?? 0
                        @endphp
                        <button type="button"
                            class="size-box btn btn-outline-dark px-3 py-2"
                            onclick="selectSize(this)"
                            data-size="{{ $size }}"
                            {{ $stock === 0 ? 'disabled style="opacity:0.5;"' : '' }}
                        >
                            {{ "$size ( $stock )" }}
                        </button>
                    @endforeach
                </div>
                <input type="hidden" id="selectedSize" name="size" required>
            </div>

            <!-- Số lượng -->
            <div class="quantity-control d-flex align-items-center gap-2 mb-3">
                <label>Số lượng:</label>
                <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity(-1)">−</button>
                <input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control text-center" style="width: 60px;">
                <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity(1)">+</button>
            </div>

            <!-- Nút mua -->
            <input type="hidden" id="productId" value="{{ $product->id }}"> <!-- Gán id sản phẩm ẩn -->
            <button class="btn btn-danger w-100 mb-2" onclick="handleAddToCart()">🛒 Thêm vào giỏ hàng</button>
            <button class="btn btn-dark w-100" onclick="handleBuyNow()">MUA NGAY</button>


            <!-- Thông tin thêm -->
            <div class="extra-info mt-4">
                <p><strong>Kiểu dáng:</strong> {{ $product->style ?? 'Đang cập nhật' }}</p>
                <p><strong>Chất liệu:</strong> {{ $product->material ?? 'Đang cập nhật' }}</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.images = [
            "/HCShopTest/public/images/{{ $image_main }}",
            "/HCShopTest/public/images/{{ $image_alt }}"
        ];
    </script>
    <script>
        const stockBySize = {{ json_encode($stockBySize) }};
    </script>

    <script src="js/chitietsp.js"></script>
    <script src="js/detail.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script>
        function handleBuyNow() {
            const productId = document.getElementById('productId').value;
            const size = document.getElementById('selectedSize').value;
            const quantity = document.getElementById('quantity').value;

            if (!size) {
                alert('Vui lòng chọn size!');
                return;
            }

            $.ajax({
                url: '/HCShopTest/public/CartController/buyNow',
                method: 'POST',
                data: {
                    product_id: productId,
                    size: size,
                    quantity: quantity
                },
                success: function(res) {
                    // Sau khi lưu thành công, chuyển sang trang checkout
                    window.location.href = '/HCShopTest/public/CheckoutController/index?mode=buy_now';
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        }
    </script>
@endsection
