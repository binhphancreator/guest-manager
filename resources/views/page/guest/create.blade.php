@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="{{route('guests.index')}}">Danh sách đại biểu</a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100">
      <h4 class="d-flex justify-content-center">THÊM ĐẠI BIỂU</h4>
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
    <form action="{{ route('guests.store') }}" method="POST" class='row' enctype="multipart/form-data">
      @csrf
      <div class="col-6 mb-3">
        <label class="form-label">Mã số Đại biểu</label>
        <input name="guest_id" type="text" class="form-control" value="{{old('guest_id')}}">
        @if ($errors->first('guest_id'))
        <div><small class="text-danger">{{ $errors->first('guest_id') }}</small></div>
        @endif
      </div>
      <div class="col-6 mb-3">
        <label class="form-label">Tên Đại biểu</label>
        <input name="fullname" type="text" class="form-control" value="{{old('fullname')}}">
        @if ($errors->first('fullname'))
        <div><small class="text-danger">{{ $errors->first('fullname') }}</small></div>
        @endif
      </div>

      <div class="col-6 mb-3">
        <label class="form-label">Ảnh</label>
        <input name="image" type="file" class="form-control" value="{{old('image')}}">
        @if ($errors->first('image'))
        <div><small class="text-danger">{{ $errors->first('image') }}</small></div>
        @endif
      </div>
      <div class="col-6 mb-3">
        <label class="form-label">Đơn vị</label>
        <select name="group_id" class="form-select">
          <option value=""></option>
          @foreach($groups as $group)
          <option value="{{$group->id}}" {{$group->id == old('group_id') ? 'selected': ''}}>{{$group->group_name}}</option>
          @endforeach
        </select>
        @if ($errors->first('group_id'))
        <div><small class="text-danger">{{ $errors->first('group_id') }}</small></div>
        @endif
      </div>

      <div class="col-6 mb-3">
        <label class="form-label">Chức vụ</label>
        <input name="title1" type="text" class="form-control" value="{{old('title1')}}">
        @if ($errors->first('title1'))
        <div><small class="text-danger">{{ $errors->first('title1') }}</small></div>
        @endif
      </div>
      <div class="col-6 mb-3">
        <label class="form-label">Chức vụ khác (nếu có)</label>
        <input name="title2" type="text" class="form-control" value="{{old('title2')}}">
        @if ($errors->first('title2'))
        <div><small class="text-danger">{{ $errors->first('title2') }}</small></div>
        @endif
      </div>

      <div class="col-3 mb-3">
        <label class="form-label">Vị trí ghế Phiên 1</label>
        <input name="seat1" type="text" class="form-control" value="{{old('seat1')}}">
        @if ($errors->first('seat1'))
        <div><small class="text-danger">{{ $errors->first('seat1') }}</small></div>
        @endif
      </div>
      <div class="col-3 mb-3">
        <label class="form-label">Vị trí ghế Phiên 2</label>
        <input name="seat2" type="text" class="form-control" value="{{old('seat2')}}">
        @if ($errors->first('seat2'))
        <div><small class="text-danger">{{ $errors->first('seat2') }}</small></div>
        @endif
      </div>
      <div class="col-3 mb-3">
        <label class="form-label">Vị trí ghế Phiên 3</label>
        <input name="seat3" type="text" class="form-control" value="{{old('seat3')}}">
        @if ($errors->first('seat3'))
        <div><small class="text-danger">{{ $errors->first('seat3') }}</small></div>
        @endif
      </div>
      <div class="col-3 mb-3">
        <label class="form-label">Vị trí ghế Phiên 4</label>
        <input name="seat4" type="text" class="form-control" value="{{old('seat4')}}">
        @if ($errors->first('seat4'))
        <div><small class="text-danger">{{ $errors->first('seat4') }}</small></div>
        @endif
      </div>

      <div class="col-12 mb-4">
        <div class="form-check form-switch">
          <input name='is_active' class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" checked>
          <label class="form-check-label" for="flexCheckDefault">
            Hoạt động
          </label>
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
  </div>
</section>

@endsection