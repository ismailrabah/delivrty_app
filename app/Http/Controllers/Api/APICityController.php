<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\City;
use App\time_span;
use App\city_time_span;
use App\exclude_dates;
use App\Http\Api\Resources\City as CityResource;
use Carbon\Carbon;

class APICityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citys = City::paginate(10);
        return CityResource::collection($citys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $city = new City;
        $city->name = $request->name;
        $city->slug = $request->slug;
        $time_span->active = $request->active;
        $city->created_at = $request->created_at;
        $city->save();

        return response()->json([
            "message" => "city record created"
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CityResource(City::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //TODO
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO
    }

     /**
     * Attach TimeSpan , city 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attachTimeSpan(Request $request , $city_id)
    {
        $city = City::find($city_id);

        $city_time_spans = new city_time_span();
        $city_time_spans->cities_id = $city_id;
        $city_time_spans->time_spans_id = $request->time_spans_id;

        $city->time_spans()->attach($city_time_spans, ['active' => 0]);

        // $city->save();
        return response()->json(["message" => "Attached"], 201);
    }
    /**
     * Exclude TimeSpan , city 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function exclude(Request $request , $city_id)
    {
        $city =  City::find($city_id);
        $errors = Array();
        if(!$city)
            return response()->json(["message" => "city not found"], 201);
        else {
            /**$excluded =[
                    [
                        'time_spans_id'=>'1',
                        'date_from'=>'05/01/2020',
                        'date_to'=>'06/01/2020'
                    ],
                    [
                        'time_spans_id'=>'2',
                        'date_from'=>'09/01/2020',
                        'date_to'=>'12/01/2020'
                    ],
                ]
            */ 
            if(count($requests->all()) > 0 && $requests->all() != ""){
                $excludeds = [ 'excluded' => $requests->all() ];
                //Validate Json data requested
                $validator = Validator::make($excludeds, [
                    'excluded.*.time_spans_id' => 'required',
                    'excluded.*.date_from' => 'required',
                    'excluded.*.date_to' => 'required',
                ]);
                foreach ($excludeds as $excluded) {
                    $city_time_span = city_time_span::where(
                        [
                            ['time_spans_id', '=', $excluded['time_spans_id']],
                            ['cities_id', '=', $city_id]] 
                        )->first();
                    //check if sity and timeSpan is attached
                    if(!$city_time_span){
                        $errors[]=[
                            'time_spans_id'=>$excluded['time_spans_id'],
                            'msg'=> 'not attached'
                        ];
                    }else{
                        //set the excluded date of city timeSpan
                        $exclude_date = new exclude_dates();
                        $exclude_date->city_time_spans_id = $city_time_span->id;
                        $exclude_date->date_from = date($excluded['date_from']);
                        $exclude_date->date_to = date($excluded['date_to']);
                        $exclude_date->save();
                    }
                }
                return response()->json(["message" => "done" , "errors" =>$errors], 201);
            }else{
                //Disable City if no timeSpan choced (Desable All timeSpan)
                $city->active = 0;
                $city->update();
                return response()->json(["message" => "City Disabled" ], 201);
            }
        }
    }

    /**
     * Get Time span available
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTimeSpans(Request $request , $city_id , $number_of_days_to_get = 90)
    {
        $city =  City::find($city_id);
        $dates = Array();
        $count = 0;
        if($city->active)
        while($number_of_days_to_get > 0){
            $now = Carbon::now()->addMonths($count);
            $num = cal_days_in_month(CAL_GREGORIAN, $now->month, $now->year);
            $dates_month = array();
            for ($i = 1; $i <= $num; $i++) {
                if($i>$number_of_days_to_get){
                    $number_of_days_to_get = 0;
                    break;
                }
                $mktime = mktime(0, 0, 0, $now->month, $i, $now->year);
                $date = date("d-M-Y", $mktime);
                $dates_month[$i] = $date;
                $delivery_times = [];
                $city_time_span = city_time_span::where([['cities_id', '=', $city_id]])->get();
                foreach($city_time_span as $CityTimeSpan){
                    $exclude_dates = exclude_dates::where([['city_time_spans_id', '=', $CityTimeSpan->id]])->get();
                    $not_Exluded = True;
                    if(count($exclude_dates) != 0){
                        foreach($exclude_dates as $exclude_date){
                            $thisDate=date('Y-m-d', strtotime($date));
                            $date_from = date('Y-m-d', strtotime($exclude_date->date_from));
                            $date_to = date('Y-m-d', strtotime($exclude_date->date_to));
                            if (($thisDate >= $date_from) && ($thisDate <= $date_to)){
                                $not_Exluded = False;
                                break;
                            }
                        }
                    }
                    if($not_Exluded){
                        $delivery_at = date("H A", strtotime($CityTimeSpan->time_span->time_start)) . '->'. date("H A", strtotime($CityTimeSpan->time_span->time_fin));
                        $delivery_times[] = [
                            "id" => $CityTimeSpan->id,
                            "delivery_at" => $delivery_at,
                            "created_at" => $CityTimeSpan->created_at,
                            "updated_at" => $CityTimeSpan->updated_at,
                        ];
                    }
                }
                if(count($delivery_times)!=0)
                    $dates[] = [
                        "day_name" => date("l", strtotime($date)),
                        "date" => date("Y-m-d", strtotime($date)),
                        "delivery_times" => $delivery_times
                    ];
            }
            $number_of_days_to_get = $number_of_days_to_get - $num;
            $count++;
        }
        
        return response()->json(["dats" => $dates ], 201);
    }

}
