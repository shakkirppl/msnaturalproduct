<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use DB;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use App\Models\Stores;
use Carbon\Carbon;
class ReviewController extends Controller
{
    //
    
    public function save_review(Request $request)
    {
      
        try {
     
          
        DB::transaction(function () use ($request) {
            if (session('activecountry')) {
                $countryCode = session('activecountry');
          } else {
              $position = Location::get();
              $countryCode = $position->countryCode ?? 'IN'; 
          }
      
          $store = Stores::where('countryCode', $countryCode)->first();
          $storeId = $store->id ?? 1;
          if( $file = $request->file('image') ) {
            $path = 'uploads/review';
            $image = $this->file($file,$path,387,673);
        }else{$image='defalut.jpg';}

          $review=new Review;
          $review->in_date=Carbon::now()->toDatestring();
          $review->in_time=date('H:i:s');
          $review->product_id=$request->product_id;
          $review->user_id=Auth::id();
          $review->store_id=$storeId;
          $review->review=$request->review;
          $review->image=$image;
          $review->name=$request->name;
          $review->start_ratings=$request->rating;
          $review->status='Pending';
          $review->save();
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function review_pending(Request $request)
    {
      
        try {
     
           $review=Review::with('product','stores','user')->where('status','Pending')->get();
          return view('review.pending',compact('review'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function review_active(Request $request)
    {
      
        try {
     
           $review=Review::with('product','stores','user')->where('status','Active')->get();
          return view('review.active',compact('review'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function review_block(Request $request)
    {
      
        try {
     
           $review=Review::with('product','stores','user')->where('status','Block')->get();
          return view('review.block',compact('review'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function active($id)
    {
      
        try {
     
           $review=Review::find($id);
           $review->status='Active';
           $review->save();
           return back();
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }

    public function block($id)
    {
      
        try {
     
           $review=Review::find($id);
           $review->status='Block';
           $review->save();
           return back();
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    
}
