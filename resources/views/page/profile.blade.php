@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5 mt-4">
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100">
      <h4 class="d-flex justify-content-center">Thông tin tài khoản</h4>
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if ($errors->all())
    <div class="alert alert-danger" role="alert">
      Đổi mật khẩu không thành công
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST" class='row'>
      @csrf

      <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input readonly type="text" class="form-control" value="{{$user->email}}">
      </div>

      <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Tên</label>
        <input name="name" type="text" class="form-control" value="{{$user->name}}">
        @if ($errors->first('name'))
        <div><small class="text-danger">{{ $errors->first('name') }}</small></div>
        @endif
      </div>
      <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Token</label>
        <input name="token" type="text" class="form-control" value="{{$user->token}}">
        @if ($errors->first('token'))
        <div><small class="text-danger">{{ $errors->first('token') }}</small></div>
        @endif
      </div>
      <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Mật khẩu cũ</label>
        <input name="password" type="password" autocomplete="off" class="form-control">
        @if ($errors->first('password'))
        <div><small class="text-danger">{{ $errors->first('password') }}</small></div>
        @endif
      </div>
      <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Mật khẩu mới</label>
        <input name="password_new" type="password" class="form-control">
        @if ($errors->first('password_new'))
        <div><small class="text-danger">{{ $errors->first('password_new') }}</small></div>
        @endif
      </div>
      <div class="col-12 col-md-6 mb-3">
        <label class="form-label">Nhập lại mật khẩu mới</label>
        <input name="password_re" type="password" class="form-control">
        @if ($errors->first('password_re'))
        <div><small class="text-danger">{{ $errors->first('password_re') }}</small></div>
        @endif
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
    </form>
  </div>
</section>

@endsection