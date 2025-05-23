@extends('layout')

@section('content')
    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#">
                        My Account
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                        <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#">home</a></li>
                <li class="menu_item"><a href="#">shop</a></li>
                <li class="menu_item"><a href="#">pages</a></li>
            </ul>
        </div>
    </div>

    <!-- Slider -->
    <div class="swiper mySlider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url('images/slider1a.jpg')">
                <div class="slider-content">
                    <h1>HOT Summer Promotion 2025</h1>
                    <a href="#new-arrivals" class="shop-button">Shop Now</a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url('images/slider2a.jpg')">
                <div class="slider-content">
                    <h1>Summer Vibes</h1>
                    <a href="#new-arrivals" class="shop-button">Shop Now</a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url('images/slider3a.jpg')">
                <div class="slider-content">
                    <h1>New Arrivals</h1>
                    <a href="#new-arrivals" class="shop-button">Shop Now</a>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>


    <!-- New Arrivals -->
    <div class="new_arrivals" id="new-arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">
                                All
                            </li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">
                                Women's
                            </li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">
                                Men's
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        {{--            <!-- Seach các sacnr phẩm -->--}}

        {{--            <?php--}}
        {{--            $search = '';--}}
        {{--            $filter = '';--}}

        {{--            $conditions = [];--}}

        {{--            if (isset($_GET['search']) && trim($_GET['search']) !== '') {--}}
        {{--                $search = trim($_GET['search']);--}}
        {{--                $search_safe = mysqli_real_escape_string($conn, $search);--}}
        {{--                $conditions[] = "LOWER(name) LIKE LOWER('%$search_safe%')";--}}
        {{--            }--}}

        {{--            if (isset($_GET['filter']) && in_array($_GET['filter'], ['women', 'men'])) {--}}
        {{--                $filter = $_GET['filter'];--}}
        {{--                $conditions[] = "LOWER(category) = '$filter'";--}}
        {{--            }--}}

        {{--            $where = '';--}}
        {{--            if (!empty($conditions)) {--}}
        {{--                $where = 'WHERE ' . implode(' AND ', $conditions);--}}
        {{--            }--}}

        {{--            $sql = "SELECT * FROM products $where";--}}
        {{--            $result = $conn->query($sql);--}}
        {{--            ?>--}}

        {{--            <?php if (!empty($search)): ?>--}}
        {{--            <h3>Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($search); ?>"</h3>--}}
        {{--            <?php endif; ?>--}}

                        <!--Danh sách các sản phẩm -->
            <div class="product-wrapper">
                <section class="product-section"> <br>
                    <div class="product-grid">
                        @if (!$products->isEmpty())
                            @foreach ($products as $product)
                                <?php
                                    $id = $product->id;
                                    $name = htmlspecialchars($product->name);
                                    $image = htmlspecialchars($product->image);
                                    $label = strtolower($product->label);
                                    $category = strtolower($product->category);
                                    $price = $product->price;
                                    $discount = $product->discount;
                                    $finalPrice = $discount > 0 ? $price - ($price * $discount / 100) : $price;
                                ?>

                                <div class="product-card {{ $category }}">
                                    <a href="{{ route('detail', $id) }}" class="product-image-box">
                                        <img src="images/{{ $image }}" alt="{{ $name }}">
                                        @if ($label === 'sale')
                                            <div class="product-tag sale">SALE</div>
                                        @elseif ($label === 'new')
                                            <div class="product-tag new">NEW</div>
                                        @endif
                                    </a>
                                    <div class="product-info">
                                        <h4 class="product-title">{{ $name }}</h4>
                                        <div class="product-price">
                                            @php
                                                $priceConverted = number_format($price, 0, ',', '.');
                                                $finalPriceConverted = number_format($finalPrice, 0, ',', '.');
                                            @endphp
                                            @if ($discount > 0)
                                                <span class="final">{{ $priceConverted }}₫</span>
                                                <del class="original">{{ $priceConverted }}₫</del>
                                            @else
                                                <span class="final">{{ $priceConverted }}₫</span>
                                            @endif
                                        </div>
                                        <button class="red_button add_to_cart_btn" onclick="openModal({{ $id }})">
                                            🛒 Thêm vào giỏ
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Không có sản phẩm nào.</p>
                        @endif
                    </div>
                </section>
            </div>

            <!-- Modal chọn size -->
            <div id="sizeModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h3>Chọn size sản phẩm</h3>
                    <form id="modalAddToCartForm" onsubmit="submitModalForm(event)">
                        <input type="hidden" id="modal-product-id">
                        <select id="modal-size-select" required>
                            <option value="" disabled selected>Chọn size</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <button type="submit">🛒 Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="images/img_1.png" class="transparent-image" alt="Flash Sale Girl">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Flash Sale</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Ngày</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Giờ</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Phút</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Giây</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="#new-arrivals">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>Free Ship </h6>
                            <p>Mọi đơn giao hàng </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cơ hội hoàn tiền</h6>
                            <p>Hoàn tiền lên tới 100%</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>Lỗi 1 đổi 1 </h6>
                            <p>Hoàn trả trong vòng 30 ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>mở cửa cả tuần</h6>
                            <p>8:30AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!-- Blogs -->

    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title">
                        <h2>Latest Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url('images/blog1.jpg')"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see emerging this spring.</h4>
                            <span class="blog_meta">by admin | Dec 01, 2025</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url('images/blog2.jpg')"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see emerging this summer</h4>
                            <span class="blog_meta">by admin | Dec 01, 2025</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url('images/blog3.jpg')"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see emerging this winter</h4>
                            <span class="blog_meta">by admin | Dec 01, 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
