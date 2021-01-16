<?php


use App\Models\SeatClass;
use App\Models\SeatPlan;

function get_seat_color($s_plan_id, $seat_no)
{
    $seatPlan = SeatPlan::where('id', $s_plan_id)->first();
    $seat_data = json_decode($seatPlan->class_wise_seat_qty, true);
    $seat_color = "#4CAF50";
    if ($seat_data != NULL) {
        foreach ($seat_data as $key => $value) {
            $seatNo_array = array();
            foreach ($value as $v) {
                array_push($seatNo_array, $v);
            }
            // check if exist $seat_no in $seatNo_array
            if (in_array($seat_no, $seatNo_array)) {
                // $key = seat_class_id |
                $seat_Class = SeatClass::find($key);
                $seat_color = $seat_Class->seat_color;
            }
        }
    }

    return $seat_color;
}


