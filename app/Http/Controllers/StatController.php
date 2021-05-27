<?php

namespace App\Http\Controllers;

use App\Charts\DriverFareChart;
use App\Charts\DriverHoursWorkedChart;
use App\Charts\ShiftDriveCountChart;
use App\Charts\TaxiKilometersChart;
use App\Models\Taxi;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{

    public function index()
    {
        // Taxis by Kilometers Driven
        $tk = Taxi::orderBy('kilometers')->pluck('kilometers', 'reg_plate');
        $tkc = new TaxiKilometersChart;
        $tkc->labels($tk->keys());
        $tkc->dataset('Kilometers Driven', 'bar', $tk->values())->backgroundColor('rgba(0, 0, 255, 0.9)');

        // Drivers by Money from Fares
        $df = DB::select(
           "SELECT ROUND(SUM(fare), 2) AS 'fare',
            CONCAT(drivers.first_name, ' ', drivers.last_name) AS 'driver_name'
            FROM drives
            INNER JOIN shifts ON drives.id_shift = shifts.id
            INNER JOIN drivers ON shifts.id_driver = drivers.id
            GROUP BY drivers.first_name, drivers.last_name
            ORDER BY Fare");
        
        $df_keys = [];
        $df_vals = [];
        foreach($df as $row) {
            array_push($df_keys, json_decode(json_encode($row))->driver_name); 
            array_push($df_vals, json_decode(json_encode($row))->fare); 
        }

        $dfc = new DriverFareChart;
        $dfc->labels($df_keys);
        $dfc->dataset('Money Made', 'bar', $df_vals)->backgroundColor('rgba(0, 0, 255, 0.9)');

        // Drivers by Hours Worked
        $dh = DB::select(
           "SELECT CONCAT(d.first_name, ' ', d.last_name) AS 'driver_name',
            SUM(HOUR(TIMEDIFF(end, start))) as 'hours_worked'
            FROM shifts s
            INNER JOIN drivers d ON s.id_driver = d.id
            GROUP BY s.id_driver, d.first_name, d.last_name  
            ORDER BY hours_worked");
         
        $dh_keys = [];
        $dh_vals = [];
        foreach($dh as $row) {
            array_push($dh_keys, json_decode(json_encode($row))->driver_name); 
            array_push($dh_vals, json_decode(json_encode($row))->hours_worked); 
        }
 
        $dhc = new DriverHoursWorkedChart;
        $dhc->labels($dh_keys);
        $dhc->dataset('Hours Worked', 'bar', $dh_vals)->backgroundColor('rgba(0, 0, 255, 0.9)');

        // Shifts by Number of Drives
        $sd = DB::select(
            "SELECT s.start AS shift_start,
             COUNT(*) AS number_of_drives
             FROM shifts s
             INNER JOIN drives d ON d.id_shift = s.id
             GROUP BY d.id_shift, s.start
             ORDER BY s.start");
          
         $sd_keys = [];
         $sd_vals = [];
         foreach($sd as $row) {
             array_push($sd_keys, json_decode(json_encode($row))->shift_start); 
             array_push($sd_vals, json_decode(json_encode($row))->number_of_drives); 
         }
  
         $sdc = new ShiftDriveCountChart;
         $sdc->labels($sd_keys);
         $sdc->dataset('Number of Drives', 'line', $sd_vals)->backgroundColor('rgba(0, 0, 255, 0.9)');

        return view('stat.index', compact('tkc', 'dfc', 'dhc', 'sdc'));
    }

}