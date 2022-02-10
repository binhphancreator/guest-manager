@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/guests/create">
      Thêm đại biểu
    </a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100 mb-4">
      <h4 class="d-flex justify-content-center">Danh sách đại biểu</h4>
    </div>
    <table class="table  table-hover">
      <thead>
        <tr>
          <th scope="col"></th>
          <th style="width: 15%" scope="col">ID đại biểu</th>
          <th style="width: 30%" scope="col">Tên đại biểu</th>
          <th style="width: 15%" scope="col">Nhóm</th>
          <th style="width: 20%" scope="col">Trạng thái</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($guests as $guest)
        <tr>
          <th scope="row">{{$loop->index + 1 }}</th>
          <td>{{$guest->guest_id}}</td>
          <td>{{$guest->fullname}}</td>
          <td>{{$guest->group_id}}</td>
          <td>
            @if($guest->checking_status == 1)
            <span style="color:green">ĐÃ ĐIỂM DANH</span>
            @else
            <span style="color:red">CHƯA ĐIỂM DANH</span>
            @endif
          </td>
          <td class='d-flex justify-content-end'>
            <a href="{{route('guests.edit',$guest->id)}}" class="btn btn-primary">Sửa</a>
            
            @if(auth()->user()->role_id === 1)
            <form action="{{route('guests.destroy',[$guest->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger ms-3">Xóa</button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class='d-flex justify-content-end'>
      {{$guests->links("pagination::bootstrap-4")}}
    </div>
  </div>
</section>

@endsection