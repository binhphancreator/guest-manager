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
                                <input type="text" placeholder="Nhập id group, id guest hoặc fullname" class="form-control"
                                    id="searchInput" value="{{ $search }}" name="search">
                            </div>
                            <div class="col-12">
                                <div class="form-check col-auto">
                                    <input class="form-check-input" type="checkbox" name="checkin" id="checkinStatus"
                                        {{ $checkin ? 'checked' : '' }}>
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
            <div id="tableGroupList">

            </div>
            {{-- @foreach ($groups as $group)
                <div class="mb-4 overflow-auto">
                    <h5 class="mb-2">Nhóm {{ $group->group_id }} - {{$group->group_name}}</h5>
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
                                    <td>{{ $guest->guest_id }}</td>
                                    <td>{{ $guest->fullname }}</td>
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
                                            <form action="{{ route('guests.destroy', [$guest->id]) }}" method="POST">
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
                    <h5 class="mb-2">Tổng {{count($group->guests)}} đại biểu</h5>
                </div>
            @endforeach --}}

            <div class='d-flex justify-content-end'>
                {{ $guests->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script defer>
        const groups = {};
        var guests = <?php echo json_encode($guests); ?>;
        guests.data.forEach(guest => {
            if (!groups[guest.group.id]) {
                groups[guest.group.id] = guest.group;
                groups[guest.group.id].count = 0;
                $('#tableGroupList').append(`
                <div group-id=${guest.group.id} class="mb-4 overflow-auto">
                    <h4 class="mb-2">Nhóm ${guest.group.group_id} - ${guest.group.group_name}</h4>
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
                        </tbody>
                    </table>
                    <h5 class="mb-2">Tổng 0 đại biểu</h5>
                </div>
            `);
            }
            groups[guest.group.id].count++;
            $(`#tableGroupList [group-id="${guest.group.id}"] table tbody`).append(`
                <tr>
                    <th scope="row">${groups[guest.group.id].count}</th>
                    <td>${guest.guest_id}</td>
                    <td>${guest.fullname}</td>
                    <td>
                        ${!guest.checking_status ? '<span style="color:red">CHƯA ĐIỂM DANH</span>' : '<span style="color:green">ĐÃ ĐIỂM DANH</span>'}
                    </td>
                    <td class='d-flex justify-content-end'>
                        <a href="/guests/${guest.id}/edit" class="btn btn-primary">Sửa</a>

                        @if (auth()->user()->role_id === 1)
                            <form action="/guests/${guest.id}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ms-3">Xóa</button>
                            </form>
                        @endif
                    </td>
                </tr>
            `);

            $(`#tableGroupList [group-id="${guest.group.id}"] h5`).text(`Tổng ${groups[guest.group.id].count} đại biểu`);
        });
    </script>
@endsection
