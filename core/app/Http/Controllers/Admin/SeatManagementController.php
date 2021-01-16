<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\SeatClass;
use App\Models\SeatPlan;
use Illuminate\Http\Request;

class SeatManagementController extends Controller
{
    public function SeatGenPage()
    {
        $buses = Bus::latest()->get();
        $seat_classes = SeatClass::latest()->get();
        return view('admin.pages.seat_management.SeatGeneration', compact('buses', 'seat_classes'));
    }

    public function SeatGenProcess(Request $request)
    {
        //validation
        $this->validate($request, [
            'bus_id' => 'required|unique:seat_plans',
        ]);

        $seat_plan = SeatPlan::create($request->all());

        //redirect
        return redirect()->route('admin.SeatClassGenPage', $seat_plan->id);
    }

    public function SeatPlan()
    {
        $seat_plans = SeatPlan::latest()->get();
        return view('admin.pages.seat_management.SeatPlanList', compact('seat_plans'));
    }

    public function SeatClassGenPage($seatPlanId)
    {
        $seat_plan_By_id = SeatPlan::find($seatPlanId);
        $seat_classes = SeatClass::latest()->get();
        return view('admin.pages.seat_management.SeatClassGen', compact('seat_classes', 'seat_plan_By_id'));
    }

    public function SeatClassGenProcess(Request $request)
    {
        $seat_data = [];

        // operation for old
        $seat_plan = SeatPlan::find($request->seat_plan_id);
        $old_seat_data = json_decode($seat_plan->class_wise_seat_qty, true);
        if ($old_seat_data != NULL) {
            foreach ($old_seat_data as $key => $value) {
                $old_array = array();
                foreach ($value as $v) {
                    array_push($old_array, $v);
                }
                $seat_data[$key] = $old_array;
            }
        }
//        echo "After Old: <br>";
//        print("<pre>" . print_r($seat_data, true) . "</pre>");


        // New Data insert in array
        $seat_data[$request->seatClass_id] = $request->seats;

//        echo "After Insert: <br>";
//        print("<pre>" . print_r($seat_data, true) . "</pre>");


        // Update
        $seat_plan = SeatPlan::find($request->seat_plan_id);
        $seat_plan->class_wise_seat_qty = json_encode($seat_data);
        $seat_plan->save();

        //redirect
        Session()->flash('success', 'successfully Added !');
        return redirect()->back();
    }
}
