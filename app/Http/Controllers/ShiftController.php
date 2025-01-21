<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use DB;
class ShiftController extends Controller
{
    //
    public function index()
    {
        try {
            $shift = Shift::get();
        return view('shift.index',['shift'=>$shift]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create() 
    {
        try {
        return view('shift.create');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
      
        try {
     
          
        DB::transaction(function () use ($request) {
            Shift::create_shift($request);
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function edit(Shift $shift) 
    {
  
        try {
            return view('shift.edit', [
                'shift' => $shift
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function update(Request $request,Shift $shift) {
   
        try {
           
            DB::transaction(function () use ($request,$shift) {
                Shift::update_shift($request,$shift);
        }); 
       return redirect()->route('shift.index')->with('success','Shift updated successfully');
    } catch (\Exception $e) {
        return $e->getMessage();
      }    
    }  
    public function destroy(Shift $shift) 
    {
       
        try {
            DB::transaction(function () use ($shift) {
            $shift->delete();
        }); 
            return redirect()->route('shift.index')->with('success','Shift deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
      
    }
    public function getShiftDetails(Request $request)
{
    $shift = Shift::find($request->shift_id);
    if ($shift) {
        return response()->json([
            'shift_hours' => $shift->shift_hours,
            'labor_hour_cost' => $shift->labor_hour_cost,
        ]);
    }

    return response()->json(['message' => 'Shift not found'], 404);
}
}
