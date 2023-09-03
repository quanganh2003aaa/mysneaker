<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.home') }}">
                <i class="bx bxs-home"></i>
                <span>Trang chủ</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('orderListAdmin') }}">
                <i class="ri-list-check"></i><span>Danh sách đơn hàng</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-product-hunt-fill"></i><span>Sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link " href="{{ route('admin.product.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Danh sách sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link " href="{{ route('admin.product.create') }}">
                        <i class="bi bi-circle"></i>
                        <span>Thêm sản phẩm</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#brands-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-trademark-fill"></i><span>Hãng</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="brands-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link " href="{{ route('brands.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Danh sách hãng</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link " href="{{ route('brands.create') }}">
                        <i class="bi bi-circle"></i>
                        <span>Thêm hãng</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#blogs-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-newspaper-fill"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blogs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link " href="{{ route('blogs.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Danh sách tin tức</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link " href="{{ route('blogs.create') }}">
                        <i class="bi bi-circle"></i>
                        <span>Thêm tin tức</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('shop.index') }}">
                <i class="bx bxs-home"></i>
                <span>Tới cửa hàng</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
