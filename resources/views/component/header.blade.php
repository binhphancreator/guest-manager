<header class="position-relative mb-3">
    <div class="overlay"></div>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-0">
        <div class="container-lg">
            <a class="navbar-brand fs-4 d-block flex-grow-1" href="{{route('index')}}">
                <img src="/img/logo.png" alt="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route('index')}}">Trang chủ</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            Quản lý nhóm
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('groups.create')}}">Thêm nhóm</a></li>
                            <li><a class="dropdown-item" href="{{route('groups.index')}}">Danh sách nhóm</a></li>
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
