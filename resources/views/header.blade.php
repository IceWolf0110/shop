<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">💖💖Chào Mừng Bạn Đến Với HC_Shop 💖💖</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">
                            <li class="account">
                                <a href="#">My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="account_selection">
                                    <li id="userGreeting" style="display: <?php echo isset($_SESSION['user_id']) ? 'block' : 'none'; ?>">
                                        <a href="#"><i class="fa fa-user"></i> Xin chào <?php echo $_SESSION['user_name'] ?? ''; ?></a>
                                    </li>
                                    <li id="logoutLi" style="display: <?php echo isset($_SESSION['user_id']) ? 'block' : 'none'; ?>">
                                        <a href="#" id="logoutBtn"><i class="fa fa-sign-out"></i> Logout</a>
                                    </li>
                                    <li id="loginLi" style="display: <?php echo isset($_SESSION['user_id']) ? 'none' : 'block'; ?>">
                                        <a href="LoginController/index"><i class="fa fa-sign-in"></i> Sign In</a>
                                    </li>
                                    <li id="registerLi" style="display: <?php echo isset($_SESSION['user_id']) ? 'none' : 'block'; ?>">
                                        <a href="RegisterController/index"><i class="fa fa-user-plus"></i> Register</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="#">HC <span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="HomeController/index">home</a></li>
                            <li><a href="ContactController/index">contact</a></li>
                        </ul>
                        <!-- thanh tìm kiếm  -->
                        <ul>
                            <form action="index.php" method="get" style="display: inline;">
                                <input type="text" name="search" placeholder="🔍Tìm sản phẩm..." style="padding: 5px;">
                            </form>
                        </ul>
                        <ul>
                            <ul class="navbar_user">
                                <li class="checkout">
                                    <a href="CartController/index">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>
