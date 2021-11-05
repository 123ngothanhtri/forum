<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;
use File;
class BaiVietController extends Controller
{
    function deleteComment($id){
        BinhLuan::destroy($id);
        return back()->with('msg','Đã xóa bình luận');
    }
    function suaBaiViet($id){
        $bv = BaiViet::find($id);
        return view('home.sua_bai_viet',compact('bv'));
    }
    function postSuaBaiViet(Request $req){
        
        $bv = Baiviet::find($req->id_baiviet);
        if($bv && $bv->id==Auth::guard('web')->user()->id){
            $bv->noidung_baiviet = $req->noidung;
            if($req->hasFile('hinhanh')){
                File::delete(public_path($bv->hinhanh_baiviet));
                $bv->hinhanh_baiviet = $req->file('hinhanh')->store('image_baiviet','hello');
            }

            $bv->save();

            return redirect('profile-user')->with('msg','Đã chỉnh sửa');
        }
        else{
            return view('page_error');
        }
        
    }
}
