<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }
    public function add(Request $request)
    {
        if(Auth::check()){

            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status'=>"Product added to Wishlist"]);

            }
            else{
                return response()->json(['status'=>"Product Does Not Exists"]);

            }
    
    
        }
        else{
            return response()->json(['status'=>"Log In to Continue"]);

        }
    }

    public function remove(Request $request )
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
        {
            $wish = Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
            $wish->delete();
            return response()->json(['status'=>"Wishlist Remove Successfully"]);

        }

    }
    else
    {
        return response()->json(['status'=>"Login to Remove Wishlist"]);
    }
    
}

public function wishlistcount()
{
    $wishlisttcount = Wishlist::where('user_id',Auth::id())->count();
    return response()->json(['count'=>$wishlisttcount]);
}

}
