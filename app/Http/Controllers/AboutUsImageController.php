<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutusImage;
use App\Models\NewsLetter;
use App\Models\Stores;
use DB;
use App\Helper\File;
class AboutUsImageController extends Controller
{
    use File;
    //
    public function index()
    {
        try {
            $aboutusImage = AboutusImage::get();
        return view('about-us-images.index',['aboutusImage'=>$aboutusImage]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create() 
    {
        try {
        return view('about-us-images.create');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
      
        try {
     
            if( $file = $request->file('image') ) {
                $path = 'uploads/about-us-images';
                $image = $this->file($file,$path,387,673);
            }else{$image='defalut.jpg';}

        DB::transaction(function () use ($request,$image) {
            $aboutusImage=new AboutusImage;
            $aboutusImage->image=$image;
            $aboutusImage->save();
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
   
    public function destroy(AboutusImage $aboutusImage) 
    {
       
        try {
            DB::transaction(function () use ($aboutusImage) {
            $aboutusImage->delete();
        }); 
            return redirect()->route('about-us-images.index')->with('success','About Us Image deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
      
    }
    public function news_letter()
    {
        try {
            $newsLetter = NewsLetter::get();
        return view('news-letter.index',['newsLetter'=>$newsLetter]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    
}
