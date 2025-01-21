<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkCenter;
use App\Http\Requests\BrandRequest;
use DB;
class WorkCenterController extends Controller
{
    //
    public function index()
    {
        try {
            $workCenter = WorkCenter::get();
        return view('work-center.index',['workCenter'=>$workCenter]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create() 
    {
        try {
        return view('work-center.create');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
      
        try {
     
          
        DB::transaction(function () use ($request) {
            WorkCenter::create_workcenter($request);
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function edit(WorkCenter $work_center) 
    {
  
        try {
            return view('work-center.edit', [
                'workCenter' => $work_center
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function update(Request $request,WorkCenter $work_center) {
   
        try {
           
            DB::transaction(function () use ($request,$work_center) {
                WorkCenter::update_workcenter($request,$work_center);
        }); 
       return redirect()->route('work-center.index')->with('success','Work Center updated successfully');
    } catch (\Exception $e) {
        return $e->getMessage();
      }    
    }  
    public function destroy(WorkCenter $work_center) 
    {
       
        try {
            DB::transaction(function () use ($work_center) {
            $work_center->delete();
        }); 
            return redirect()->route('work-center.index')->with('success','Work Center deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
      
    }
}
