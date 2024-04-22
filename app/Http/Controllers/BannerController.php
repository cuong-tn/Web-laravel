<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;


class BannerController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session()->get('admin_id');
        if($admin_id)
            return redirect::to('/dashboard');
        else
            return redirect::to('/admin')->send();

    }
    public function banner()

    {
        $all_banner = Banner::orderBy('banner_id', 'DESC')->paginate(10);
        return view('admin.banner.banner', compact('all_banner'));
    }

//        $all_banners = Banner::orderBy('banner_id', 'DESC')->get();
//        $all_banners = Banner::orderBy('banner_id', 'DESC')->paginate(10);
//        return view('admin.banner.banner')->with('all_banner', $all_banners);

    public function add_banner()
    {
        return view('admin.banner.add_banner');
    }
    public function insert_banner(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $get_image = $request->file('image');
        // Kiểm tra xem người dùng đã tải lên hình ảnh mới hay không
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move(public_path('upload/product'), $new_image);

            // Lưu tên hình ảnh vào cơ sở dữ liệu
           $banner = new Banner();

            // Kiểm tra xem biến $banner có tồn tại không
            if (!$banner) {
                $banner = new Banner();
            }

            // Gán giá trị cho thuộc tính 'image'
            $banner->image = $new_image;

            // Kiểm tra xem banner_desc đã được gửi từ form hay không
            if (isset($data['banner_desc'])) {
                $banner->banner_desc = $data['banner_desc'];
            }

            // Lưu thông tin banner vào cơ sở dữ liệu
            $banner->banner_name = $data['banner_name'];
            $banner->banner_status = $data['banner_status'];
            $banner->save();

            // Đặt thông báo thành công
            session()->flash('message', 'Thêm banner thành công');
        } else {
            // Nếu không có hình ảnh được tải lên, đặt thông báo lỗi
            session()->flash('message', 'Vui lòng thêm hình ảnh');
        }

//        DB::table('tbl_product')->insert($data);
//        $request->session()->put('message', 'them thanh công');
        return Redirect::to('add-banner');


//        dd($data);


    }
    public function delete_banner($banner_id){
        $this->AuthLogin();
        Banner::where('banner_id',$banner_id)->delete();
        session()->put('message',' Xóa thành công');
        return Redirect::to('banner');
    }
}
