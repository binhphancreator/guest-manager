@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/groups/create">
      Thêm nhóm
    </a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100 mb-4">
      <h4 class="d-flex justify-content-center">Danh sách nhóm</h4>
    </div>
    <table class="table  table-hover">
      <thead>
        <tr>
          <th style="width: 5%" scope="col"></th>
          <th style="width: 40%" scope="col">ID nhóm</th>
          <th style="width: 30%" scope="col">Tên nhóm</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($groups as $group)
        <tr>
          <th scope="row">{{$loop->index + 1 }}</th>
          <td>{{$group->group_id}}</td>
          <td>{{$group->group_name}}</td>
          <td class='d-flex justify-content-end'>
            <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary">Sửa</a>
            
            @if(auth()->user()->role_id === 1)
            <form action="{{route('groups.destroy',[$group->id])}}" method="POST">
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
      {{$groups->links("pagination::bootstrap-4")}}
    </div>
  </div>
</section>

@endsection