<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Follow;
use App\Models\BaiViet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    function likeBaiViet($id){
        // $aaa = Like::select('id_baiviet')->where('id_baiviet',$id)->first();
        // $bbb = Like::select('id')->where('id',Auth::guard('web')->user()->id)->first();
        if(Like::whereRaw('id_baiviet=? AND id=?',[$id,Auth::guard('web')->user()->id])->first()){
            $xx = Like::whereRaw('id_baiviet=? AND id=?',[$id,Auth::guard('web')->user()->id])->first();
            $xx->delete();
            return back()->with('msg','Đã bỏ like');
        }
        else{
            $checkId = BaiViet::select('id_baiviet')->where('id_baiviet',$id)->first();
            if($checkId){
                $like = new Like;
                $like->id_baiviet = $id;
                $like->id = Auth::guard('web')->user()->id;
                $like->save();

                return back()->with('msg','Đã like');
            }
            else{
                return view('page_error');
            }
            
        }
        
    }
    
    function moiNguoi(){
        $user = User::orderBy('id','desc')->get();
        return view('home.moi_nguoi',compact('user'));
    }
    function following(){
        $user = Follow::join('users','users.id','follow.id_user_fl')
        ->where('follow.id_user',Auth::guard('web')->user()->id)
        ->get();

        return view('home.following',compact('user'));
    }
    function follow($id){
        
        if(Follow::whereRaw('id_user=? AND id_user_fl=?',[Auth::guard('web')->user()->id, $id])->first()){
            $xx = Follow::whereRaw('id_user=? AND id_user_fl=?',[Auth::guard('web')->user()->id, $id])->first();
            $xx->delete();
            return back()->with('msg','Đã bỏ follow');
        }
        else{
            if(User::select('id')->where('id',$id)->first()){
                $fl = new Follow;
                $fl->id_user = Auth::guard('web')->user()->id;
                $fl->id_user_fl = $id;
                $fl->save();

                return back()->with('msg','Đã follow');
            }
            else{
                return view('page_error');
            }
            
        }
    }
}
