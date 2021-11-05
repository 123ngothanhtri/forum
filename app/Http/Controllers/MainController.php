<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\TheLoai;
use App\Models\BinhLuan;
use App\Models\User;
use App\Models\Like;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    function trangchu(){
        $bv = BaiViet::join('users', 'baiviet.id', 'users.id')->orderBy('id_baiviet','desc')->simplePaginate(5);
        // $bv = DB::table('baiviet')
        // ->selectRaw('(SELECT COUNT(*) FROM like WHERE baiviet.id_baiviet=like.id_baiviet ) as cbv  ');
        
        
        // ('users', 'baiviet.id', 'users.id')->orderBy('id_baiviet','desc')->get();
        $user = User::select('id','name','image')->orderBy('id','desc')->get();
        $like = Like::all();
        // ->selectRaw('select')
        return view('home.trang_chu',compact('bv','like','user'));
    }
    function dangFollow(){
        $bv = BaiViet::join('users', 'baiviet.id', 'users.id')->orderBy('id_baiviet','desc')->paginate(5);
        $user = User::select('id','name','image')->orderBy('id','desc')->get();
        $like = Like::all();
        // ->selectRaw('select')
        return view('home.trang_chu',compact('bv','like','user'));
    }
    function themBaiViet(){
        $tl = TheLoai::all();
        return view('home.them_bai_viet',compact('tl'));
    }
    function postThemBaiViet(Request $req){
        $add = new BaiViet;
        if($req->noidung){
            $add->noidung_baiviet = $req->noidung;
        }
        if($req->hasFile('hinhanh')){
            $add->hinhanh_baiviet = $req->file('hinhanh')->store('image_baiviet','hello');
            Image::make(public_path($add->hinhanh_baiviet))->resize(null,200,function($c){$c->aspectRatio();})->save();
        }
        if($req->hasFile('multipleimage')){
            $images=[];
            $image = $req->file('multipleimage');
            foreach($image as $img){
                
                $photo = $img->store('multiple_image','hello');
                Image::make(public_path($photo))->resize(null,200,function($c){$c->aspectRatio();})->save();
                $images[] = $photo;
            }
            $add->multipleimage = implode('|',$images);
        }
    //     if($req->hasFile('hinhanh')) {

    //         $image       = $req->file('hinhanh');
    //         $filename    = $image->getClientOriginalName();
        
    //         $image_resize = Image::make($image->getRealPath())->resize(null,200,function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->store('image_baiviet','hello');//->save(public_path('image_baiviet/'.rand(111111, 888999)*time().$filename));
    //    // store('image_resize','hello');
    //     }
        
        $add->id = Auth::guard('web')->user()->id;
        $add->ngaythem_baiviet = date("Y-m-d H:i:s");
        $add->save();
        return redirect('/')->with('msg','Đã đăng');

    }
    function xemBaiViet($id){
        $xem = BaiViet::find($id);
        $xem->luotxem_baiviet++;
        $xem->save();
        $user = User::find($xem->id);
        $bl = BinhLuan::where('id_baiviet',$xem->id_baiviet)->join('users', 'binhluan.id', 'users.id')->orderby('id_binhluan','desc')->get();
        
        return view('home.xem_bai_viet',compact('xem','user','bl'));
    }
    function postBinhLuan(Request $req){
        $add = new BinhLuan;
        $add->noidung_binhluan = $req->binhluan;
        $add->id = Auth::guard('web')->user()->id;
        $add->id_baiviet = $req->idbv;
        $add->ngay_binhluan = date("Y-m-d H:i:s");
        $add->save();
        return back()->with('msg','Đã bình luận');
    }
    
    function xemProfile($id){
        if(Auth::guard('web')->check() && $id==Auth::guard('web')->user()->id){
            return redirect('profile-user'); 
        }
        else{
            $user = User::find($id);
            $baiviet = BaiViet::where('id',$id)->get();
            return view('home.xem_profile',compact('user','baiviet'));
        }
        
        
    }
}
