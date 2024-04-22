@extends('admin_layout');
@section('admin_content')



    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Banner
                </header>
                <div class="panel-body">
                    <?php
                    $message =session()->get('message');
                    echo '<div style="color: red;text-align: center">',$message,'</div>';
                    Session()->put('message',null);
                    ?>
                    <div class="position-center">
                        <form role="form" id="brandValidation" action="{{URL::to('/insert-banner')}}"  method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Banner</label>
                                <input type="text" class="form-control" name="banner_name" placeholder="Tên Banner" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" class="form-control" name="image" placeholder="Tên Banner" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả Banner</label>
                                <textarea type="text" style="resize: none" rows="3" class="form-control" name="baner_desc" placeholder="Mô tả danh mục" required></textarea>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Tên Keyword</label>--}}
{{--                                <input type="text" class="form-control" name="meta_keyword" placeholder="Tên keyword" required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="banner_status" class="form-control input-sm ms-15">
                                    <option value="0">Hiện banner</option>
                                    <option value="1">Ẩn banner</option>

                                </select>
                            </div>
                            <button type="submit" name="add_banner class="btn btn-info">Thêm Banner</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

    <script>
        $("#brandValidation").validate({
            rules:{
                brand_product_name:
                    {
                        minlength: 2
                    }
            },
            messages: {
                required: "Bạn chưa điền mục này",
                minlength: jQuery.validator.format("Please")
            },

            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>

@endsection


