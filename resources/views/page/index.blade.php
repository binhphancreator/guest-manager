@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
    <form action="{{ route('guests.index') }}" method="GET">
        <div class="p-3 py-4 shadow-sm rounded-3">
            <div class="mb-4">
                <h3 class="text-center">Tìm kiếm nhóm, đại biểu</h3>
            </div>
            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <label for="searchInput" class="form-label">Từ khóa</label>
                    <input type="text" placeholder="Nhập id group, id guest hoặc fullname" class="form-control" id="searchInput" name="search">
                </div>
                <div class="col-6 mb-4">
                    <select id="groupSelect" name="search_group[]">
                        @foreach($groups as $group)
                        <option>{{$group->group_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <div class="form-check col-auto">
                        <input class="form-check-input" type="checkbox" name="checkin" id="checkinStatus">
                        <label class="form-check-label" for="checkinStatus">
                            Chưa checkin
                        </label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn-rounded-left p-2">Tìm kiếm</button>
            </div>
        </div>
    </form>
</section>
@endsection