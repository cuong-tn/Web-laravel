@extends('admin_layout');
@section('admin_content')


    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục Banner
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
            </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = session()->get('message');
                echo '<div style="color: red">',$message,'</div>';
                Session()->put('message',null);
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên Baner</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>


                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_banner as $banner_pro)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{ $banner_pro->banner_name }}</td>
                            <td>
                                <img src="/upload/product/{{ $banner_pro->image }}" style="height: 76px; width: 478px;">
                                {{ $banner_pro->image }}
                            </td>
                            <td>{{ $banner_pro->banner_desc }}</td>
                            <td>
            <span class="text-ellipsis">
            @if ($banner_pro->banner_status == 0)
                    <a href="{{ URL::to('/unactive-banner/'.$banner_pro->banner_id) }}" class="check-styling"><span class="nuthien">Hiện</span></a>
                @else
                    <a href="{{ URL::to('/inactive-banner/'.$banner_pro->banner_id) }}" class="check-styling"><span class="nutan">Ẩn</span></a>
                @endif
            </span>
                            </td>
                            <td>
                                <a href="{{ URL::to('/delete-banner/'.$banner_pro->banner_id) }}">
                                    <i class="nutxoa" onclick="return confirm('Bạn muốn xóa Banner?')">Xóa</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">

                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{$all_banner->links()}}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>


@endsection
