<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuchData;

class much extends Controller
{
    //Create Data Form
    public function CreateForm() {
        return view('welcome');
    }
    
    //This returns Work Hours and Days needed to buy the Desired Item
    public function Math(Request $request) {
        
        //Form Validation For Input Data
        $this->validate($request, [
            'item_price'=>'required',
            'salary'=>'required',
            'standard_hours'=>'required',
            'standard_days'=>'required',
            'netflix_fee'=>'required' 
        ]);

        //Store Input Data in Database
        MuchData::create($request->all());

        //Declare Input Data into this method
        $ItemPrice = $request->get('item_price');
        $Salary = $request->get('salary');
        $StandardHours = $request->get('standard_hours');
        $StandardDays = $request->get('standard_days');
        $NetFlixFee = $request->get('netflix_fee');
        
        //Calculte Output Data
        $HourlyPay = $Salary / ($StandardHours * $StandardDays * 4);
        $HoursNeeded = intval($ItemPrice / $HourlyPay) + 1;
        $DaysNeeded = intval($HoursNeeded / $StandardHours) + 1;
        $NetFlixHours = intval($NetFlixFee / $HourlyPay) + 1;
        $NetFlixDays = intval($NetFlixHours / $StandardHours) + 1;

        //Determine the need for NetFlix 
        if ($NetFlixDays >= $StandardDays) {
            $Alert = "Please Cancel NetFlix!";
        }
        else {
            $Alert = "No need to cancel NetFlix.";
        }
        
        //Assign Data into array (Input & Output)
        $data = [
            'item_price' => $ItemPrice,
            'salary' => $Salary,
            'standard_hours' => $StandardHours,
            'standard_days' => $StandardDays,
            'netflix_fee' => $NetFlixFee,
            'hourly_pay' => $HourlyPay,
            'hours_needed' => $HoursNeeded,
            'days_needed' => $DaysNeeded,
            'netflix_hours' => $NetFlixHours,
            'netflix_days' => $NetFlixDays,
            'netflix_alert' => $Alert
        ];

        //Converting data to .json format
        $json = json_encode($data);
        $file = fopen("data.json", "w") or die("Unable to create a JSON file!");
        fwrite($file, $json);
        fclose($file);
 
        return back()->with('json.data', $json);

    }
}
