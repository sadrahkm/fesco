<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">پنل مدیریت</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route("homepage") }}">صفحه اصلی <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    کاربران
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route("admin.users.index") }}">لیست کاربران</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route("admin.users.create") }}">افزودن کاربر جدید</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    غذاها
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route("admin.foods.index") }}">لیست غذاها</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route("admin.foods.create") }}">افزودن غذای جدید</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    سفارشات
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route("admin.orders.index") }}">لیست سفارشات</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    دسته بندی ها
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route("admin.categories.index") }}">لیست دسته بندی ها</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route("admin.categories.create") }}">افزودن دسته بندی جدید</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    رزروها
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route("admin.reserves.index") }}">لیست رزرو ها</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    کوپن ها
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route("admin.coupon.index") }}">لیست کوپن ها</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route("admin.coupon.create") }}">افزودن کوپن جدید</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    تنظیمات
                </a>
            </li>
        </ul>
    </div>
</nav>
