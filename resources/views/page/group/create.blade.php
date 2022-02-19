@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/groups">DANH SÁCH ĐƠN VỊ</a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100">
      <h4 class="d-flex justify-content-center">Tạo đơn vị</h4>
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if ($errors->all())
    <div class="alert alert-danger" role="alert">
      Tạo không thành công
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('groups.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Id đơn vị</label>
        <input name="group_id" type="text" class="form-control" value="{{old('group_id')}}">
        @if ($errors->first('group_id'))
        <div><small class="text-danger">{{ $errors->first('group_id') }}</small></div>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Tên đơn vị</label>
        <input name="group_name" type="text" class="form-control" value="{{old('group_name')}}">
        @if ($errors->first('group_name'))
        <div><small class="text-danger">{{ $errors->first('group_name') }}</small></div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">THÊM</button>
    </form>
  </div>
</section>

@endsection