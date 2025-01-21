<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Stores;
use DB;
use App\Helper\File;
class TestimonialController extends Controller
{
    use File;
    //
    public function index()
    {
        try {
            $testimonial = Testimonial::get();
        return view('testimonial.index',['testimonial'=>$testimonial]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create() 
    {
        try {
            $stores=Stores::get();
        return view('testimonial.create',['stores'=>$stores]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
      
        try {
    //  return $request->all();
            if( $file = $request->file('image') ) {
                $path = 'uploads/testimonial';
                $image = $this->file($file,$path,150,150);
            }else{$image='defalut.jpg';}

        DB::transaction(function () use ($request,$image) {
            $Testimonial=new Testimonial;
            $Testimonial->auther=$request->auther;
            $Testimonial->image=$image;
            $Testimonial->description=$request->description;
            $Testimonial->store_id=$request->store_id;
            $Testimonial->save();
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function edit(Testimonial $videoGallary) 
    {
  
        try {
            return view('testimonial.edit', [
                'testimonial' => $testimonial
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function update(Request $request,Testimonial $testimonial) {
   
        try {
           
            DB::transaction(function () use ($request,$testimonial) {
                Testimonial::update_testmonial($request,$testimonial);
        }); 
       return redirect()->route('testimonial.index')->with('success','Testimonial updated successfully');
    } catch (\Exception $e) {
        return $e->getMessage();
      }    
    }  
    public function destroy(Testimonial $testimonial) 
    {
       
        try {
            DB::transaction(function () use ($testimonial) {
            $testimonial->delete();
        }); 
            return redirect()->route('testimonial.index')->with('success','Testimonial deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
      
    }
}
