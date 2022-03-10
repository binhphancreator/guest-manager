@extends('layout.default')

@section('body')
@include('component.header')
<section class="main-content container-lg mb-5">
    <div class="mb-3">
        <a href="{{route('guests.create')}}">
            Thêm đại biểu
        </a>
    </div>
    <div class="p-4 border-top shadow-sm rounded-3">
        <div class='row mb-5'>
            <form action="{{ route('guests.index') }}" method="GET">
                <div class="p-3 py-4">
                    <div class="mb-4">
                        <h3 class="text-center">Tìm kiếm Đại biểu</h3>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 mb-4">
                            <label for="searchInput" class="form-label">Mã Đại biểu</label>
                            <input type="text" placeholder="Nhập mã đại biểu" class="form-control" id="searchInput" value="{{ $search }}" name="search">
                        </div>
                        <div class="col-12 mb-4">
                            <select id="groupSelect" name="search_group[]">
                                @foreach($groups as $group)
                                <option {{is_array($search_group) && in_array($group->id, $search_group) ? 'selected':''}} value="{{$group->id}}">{{$group->group_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-check col-auto">
                                <input class="form-check-input" type="checkbox" name="checkin" id="checkinStatus" {{ $checkin ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkinStatus">
                                    Chưa checkin
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-check col-auto">
                                <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ $is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="isActive">
                                    Đang hoạt động
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
            <h4 class="d-flex justify-content-center">DANH SÁCH ĐẠI BIỂU</h4>
        </div>
        <div id="tableGroupList">

        </div>

        <h4 class="pt-4 border-top  d-flex-count" id="totaleGuest"></h4>
    </div>
</section>
@endsection

@section('js')
<script defer>
    const groups = {};
    const prefix = "{{config('app.prefix_web')}}";
    var guests = <?php echo json_encode($guests); ?>;
    let checkinCount = 0
    let checkoutCount = 0
    guests.forEach(guest => {
        if (!(guest.group && guest.group.id)) return
        if (!groups[guest.group.id]) {
            groups[guest.group.id] = {
                ...guest.group,
                count: 0,
                checkinCount: 0,
                checkoutCount: 0
            };

            $('#tableGroupList').append(`
                <div group-id=${guest.group.id} class="mb-4 overflow-auto">
                    <h4 class="mb-2">${guest.group.group_name}</h4>
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th style="width: 20px" scope="col"></th>
                                <th style="width: 15%" scope="col">Mã số đại biểu</th>
                                <th style="width: 30%" scope="col">Tên đại biểu</th>
                                <th style="width: 20%" scope="col">Trạng thái</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="mb-2 d-flex-count" style="padding-left:34px; font-size:1.25rem;">Tổng: 0 đại biểu</div>
                </div>
            `);
        }
        groups[guest.group.id].count++;
        if (guest.checking_status) {
            groups[guest.group.id].checkinCount++
            checkinCount++
        }
        if (!guest.checking_status) {
            groups[guest.group.id].checkoutCount++
            checkoutCount++
        }
        $(`#tableGroupList [group-id="${guest.group.id}"] table tbody`).append(`
                <tr>
                    <th style="vertical-align: middle;"  scope="row">${groups[guest.group.id].count}</th>
                    <td style="vertical-align: middle;"> <a href="/${prefix}/guest?guest_id=${guest.guest_id}" target="_blank">${guest.guest_id}</a></td>
                    <td style="vertical-align: middle;"> <a href="/${prefix}/guest?guest_id=${guest.guest_id}" target="_blank">${guest.fullname}</a></td>
                    <td style="vertical-align: middle;">
                        ${!guest.checking_status ? '<span style="color:red">CHƯA ĐIỂM DANH</span>' : '<span style="color:green">ĐÃ ĐIỂM DANH</span>'}
                    </td>
                    <td class='d-flex justify-content-end'>
                        <a href="/${prefix}/guests/${guest.id}/edit" class="btn btn-primary">Sửa</a>
                        @if (auth()->user()->role_id === 1)
                        <button type="button" class="btn btn-danger  ms-3" data-bs-toggle="modal" data-bs-target="#model${guest.id}">
                        Xóa
                        </button>
                        <div class="modal fade" id="model${guest.id}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Xóa nhóm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn chắc chắn muốn xóa đại biểu:  ${guest.fullname}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="/${prefix}/guests/${guest.id}" method="POST">
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
            `);
        $(`#tableGroupList [group-id="${guest.group.id}"] > div`).
        html(`<div>Tổng: ${groups[guest.group.id].count} đại biểu<span class="dash-count">- </span> </div> 
        <div style="color:green">Đã điểm danh: ${groups[guest.group.id].checkinCount} đại biểu<span class="dash-count">- </span> </div>
        <div style="color:red">Chưa điểm danh: ${groups[guest.group.id].checkoutCount} đại biểu</div>
        `);
    });
    $("#totaleGuest").text(`Tổng số ${guests.length} đại biểu`).html(`<div>Tổng số: ${guests.length} đại biểu<span class="dash-count">- </span> </div> 
        <div style="color:green">Đã điểm danh: ${checkinCount} đại biểu<span class="dash-count">- </span> </div>
        <div style="color:red">Chưa điểm danh: ${checkoutCount} đại biểu</div>
        `);
</script>
@endsection