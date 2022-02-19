<header class="position-relative mb-3">
    <div class="overlay"></div>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-0">
        <div class="container-lg">
            <a class="navbar-brand fs-4 d-block " href="{{route('index')}}">
                <img src="/img/logo.png" alt="" srcset="">
            </a>
            <div class="flex-grow-1 fw-bold">
                <div>ĐẠI HỘI ĐẠI BIỂU ĐOÀN TNCS HỒ CHÍ MINH XÃ ĐA TỐN</div>
                <div>LẦN THỨ XXV NHIỆM KỲ 2022 – 2027</div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route('index')}}">Trang chủ</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            Quản lý đơn vị
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('groups.create')}}">Thêm đơn vị</a></li>
                            <li><a class="dropdown-item" href="{{route('groups.index')}}">Danh sách đơn vị</a></li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            Quản lý đại biểu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('guests.create')}}">Thêm đại biểu</a></li>
                            <li><a class="dropdown-item" href="{{route('guests.index')}}">Danh sách đại biểu</a></li>
                        </ul>
                    </div>
                    @auth
                    <a class="nav-link active" aria-current="page" href="{{route('profile.index')}}">Tài khoản</a>
                    <a class="btn-rounded-left" href="{{route('logout')}}">Đăng xuất</a>
                    @endauth
                    @guest
                    <a class="btn-rounded-left" href="{{route('login')}}">Đăng nhập</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>