<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoGallary;
use App\Models\Stores;
use DB;
use App\Helper\File;
class VideoGallaryController extends Controller
{
    use File;
    //
    public function index()
    {
        try {
            $videoGallary = VideoGallary::get();
        return view('video-gallary.index',['videoGallary'=>$videoGallary]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create() 
    {
        try {
            $stores=Stores::get();
        return view('video-gallary.create',['stores'=>$stores]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
      
        try {
     
            if( $file = $request->file('image') ) {
                $path = 'uploads/video';
                $image = $this->file($file,$path,387,673);
            }else{$image='defalut.jpg';}

        DB::transaction(function () use ($request,$image) {
            $videoGallary=new VideoGallary;
            $videoGallary->channel=$request->channel;
            $videoGallary->image=$image;
            $videoGallary->video=$request->video;
            $videoGallary->store_id=$request->store_id;
            $videoGallary->save();
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function edit(VideoGallary $videoGallary) 
    {
  
        try {
            return view('video-gallary.edit', [
                'videoGallary' => $videoGallary
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function update(Request $request,VideoGallary $videoGallary) {
   
        try {
           
            DB::transaction(function () use ($request,$videoGallary) {
                VideoGallary::update_video($request,$videoGallary);
        }); 
       return redirect()->route('video-gallary.index')->with('success','Video Gallary updated successfully');
    } catch (\Exception $e) {
        return $e->getMessage();
      }    
    }  
    public function destroy(VideoGallary $videoGallary) 
    {
       
        try {
            DB::transaction(function () use ($videoGallary) {
            $videoGallary->delete();
        }); 
            return redirect()->route('video-gallary.index')->with('success','Video Gallary deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
      
    }
}
