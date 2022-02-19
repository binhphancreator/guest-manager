@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/groups">DANH SÁCH ĐƠN VỊ</a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100">
      <h4 class="d-flex justify-content-center">SỬA ĐƠN VỊ</h4>
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if ($errors->all())
    <div class="alert alert-danger" role="alert">
      Sửa không thành công
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('groups.update', [$group->id]) }}" method="POST">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label class="form-label" for="exampleInputEmail1">Mã đơn vị</label>
        <input name="group_id" type="text" class="form-control" id="exampleInputEmail1" value="{{$group->group_id}}">
        @if ($errors->first('group_id'))
        <div><small class="text-danger">{{ $errors->first('group_id') }}</small></div>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label" for="exampleInputPassword1">Tên đơn vị</label>
        <input name="group_name" type="text" class="form-control" id="exampleInputPassword1" value="{{$group->group_name}}">
        @if ($errors->first('group_name'))
        <div><small class="text-danger">{{ $errors->first('group_name') }}</small></div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
    </form>
  </div>
</section>

@endsection