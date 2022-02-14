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
        <div class='row mb-5'>
            <form action="{{ route('guests.index') }}" method="GET">
                <div class="p-3 py-4">
                    <div class="mb-4">
                        <h3 class="text-center">Tìm kiếm nhóm, đại biểu</h3>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 mb-4">
                            <label for="searchInput" class="form-label">Từ khóa</label>
                            <input type="text" placeholder="Nhập id group, id guest hoặc fullname" class="form-control" id="searchInput" value="{{$search}}" name="search">
                        </div>
                        <div class="col-12">
                            <div class="form-check col-auto">
                                <input class="form-check-input" type="checkbox" name="checkin" id="checkinStatus" {{$checkin ? 'checked' : ''}}>
                                <label class="form-check-label" for="checkinStatus">
                                    Trạng thái checkin
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-rounded-left p-2">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="my-3 w-100 mb-4">
            <h4 class="d-flex justify-content-center">Danh sách đại biểu</h4>
        </div>
        @foreach ($groups as $group)
        <div class="mb-4 overflow-auto">
            <h5 class="mb-2">Nhóm {{$group->group_name}}</h5>
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
                        <th scope="col"></th>
                        <th style="width: 15%" scope="col">ID đại biểu</th>
                        <th style="width: 30%" scope="col">Tên đại biểu</th>
                        <th style="width: 20%" scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($group->guests as $guest)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><a href="{{ route('guests.detail', ['guest_id'=> $guest->guest_id]) }}" target=”_blank”> {{ $guest->guest_id }}</a></td>
                        <td><a href="{{ route('guests.detail', ['guest_id'=> $guest->guest_id]) }}" target=”_blank”> {{ $guest->fullname }}</a></td>
                        <td>
                            @if ($guest->checking_status == 1)
                            <span style="color:green">ĐÃ ĐIỂM DANH</span>
                            @else
                            <span style="color:red">CHƯA ĐIỂM DANH</span>
                            @endif
                        </td>
                        <td class='d-flex justify-content-end'>
                            <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-primary">Sửa</a>

                            @if (auth()->user()->role_id === 1)
                            <button type="button" class="btn btn-danger  ms-3" data-bs-toggle="modal" data-bs-target="#model{{$guest->id}}">
                                Xóa
                            </button>
                            <div class="modal fade" id="model{{$guest->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa đại biểu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn chắc chắn muốn xóa đại biểu: {{$guest->fullname}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('guests.destroy', [$guest->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger ms-3">Xóa</button>
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
            <h5 class="mb-2">Tổng {{count($group->guests)}} đại biểu</h5>
        </div>
        @endforeach

        <div class='d-flex justify-content-end'>
            {{ $groups->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>

@endsection