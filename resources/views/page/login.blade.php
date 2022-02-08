@extends('layout.default')

@section('body')
    @include('component.header')
    <section class="main-content container-lg mb-5">
        <form action="{{ route('post.login') }}" method="POST">
            @csrf
            <div class="p-3 py-4 shadow-sm rounded-3">
                <div class="mb-4">
                    <h3 class="text-center">Đăng nhập hệ thống</h3>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="text" placeholder="Email bạn dùng để đăng nhập" class="form-control"
                            id="emailInput" name="email">
                        @if ($errors->first('email'))
                            <div><small class="text-danger">{{ $errors->first('email') }}</small></div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="passwordInput" class="form-label">Mật khẩu</label>
                        <input type="password" placeholder="Mật khẩu" class="form-control" id="passwordInput"
                            name="password">
                        @if ($errors->first('password'))
                            <div><small class="text-danger">{{ $errors->first('password') }}</small></div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn-rounded-left p-2" href="/lookup-violation.html">Đăng nhập</button>
                </div>
            </div>
        </form>
    </section>
@endsection
