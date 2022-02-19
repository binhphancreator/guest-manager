@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
  <div class="mb-3">
    <a href="/groups/create">
      Thêm đơn vị
    </a>
  </div>
  <div class="p-4 border-top shadow-sm rounded-3">
    <div class="my-3 w-100 mb-4">
      <h4 class="d-flex justify-content-center">DANH SÁCH ĐƠN VỊ</h4>
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <table class="table  table-hover">
      <thead>
        <tr>
          <th style="width: 5%" scope="col"></th>
          <th style="width: 40%" scope="col">Mã đơn vị</th>
          <th style="width: 30%" scope="col">Tên đơn vị</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($groups as $group)
        <tr>
          <th style="vertical-align: middle;" scope="row">{{$loop->index + 1 }}</th>
          <td style="vertical-align: middle;">{{$group->group_id}}</td>
          <td style="vertical-align: middle;">{{$group->group_name}}</td>
          <td class='d-flex justify-content-end'>
            <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary">Sửa</a>

            @if(auth()->user()->role_id === 1)
            <button type="button" class="btn btn-danger  ms-3" data-bs-toggle="modal" data-bs-target="#model{{$group->id}}">
              Xóa
            </button>
            <div class="modal fade" id="model{{$group->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Xóa đơn vị</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Bạn chắc chắn muốn xóa đơn vị: {{$group->name}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <form action="{{route('groups.destroy',[$group->id])}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger  ms-3">Xóa</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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