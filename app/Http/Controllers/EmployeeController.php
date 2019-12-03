<?php

namespace App\Http\Controllers;

use App\Models\AttendSheet;
use App\Models\monthlyOutcome;
use Carbon\Carbon;
use app\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class EmployeeController extends Controller
{
    protected $table = 'users';

    public function checkIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|exists:users,name',
        ]);

        if ($validator->fails()) {
            $response['success'] = false;
            $response['error'] = $validator->errors();
            return response()->json($response, 400);
        }
        $user = User::where('name',$request->name)->first();
        $checkinbefore = AttendSheet::where('user_id',$user->id)->where('date',Carbon::now()->format('Y-m-d'))->first();
        if($checkinbefore){
            $response['success'] = false;
            $response['error'] = 'you checked in before';
            return response()->json($response, 400);
        }
        $checkin = AttendSheet::create([
            'date' => Carbon::now()->format('Y-m-d'),
            'checkIn' => Carbon::now(),
            'user_id'=>$user->id
        ]);
        if (!$checkin){
            $response['success'] = false;
            $response['error'] = 'some thing went Wrong will adding attendance';
            return response()->json($response, 400);
        }
        $response['success'] = true;
        $response['message'] = 'thanks for checking in ';
        $response['data'] = $checkin;
        return response()->json($response, 200);
    }


    public function checkOut(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|exists:users,name',
        ]);

        if ($validator->fails()) {
            $response['success'] = false;
            $response['error'] = $validator->errors();
            return response()->json($response, 400);
        }
        $user = User::where('name',$request->name)->first();
        $checkoutbefore = AttendSheet::where('user_id',$user->id)->where('date',Carbon::now()->format('Y-m-d'))->where('checkOut',Carbon::now())->first();
        if($checkoutbefore){
            $response['success'] = false;
            $response['error'] = 'you checked in before';
            return response()->json($response, 400);
        }
        $attendSheet =AttendSheet::where('user_id',$user->id)->where('date',Carbon::now()->format('Y-m-d'))->first();
        $checkoutTime = Carbon::now()->getTimestamp();
        $datetime1 = (new \DateTime($attendSheet->checkIn))->getTimestamp();
        $minutes = intval (abs(($checkoutTime - $datetime1)/60)) ;
        $checkout=AttendSheet::where('user_id',$user->id)->where('date',Carbon::now()->format('Y-m-d'))->first();
        if ($checkout->checkOut != null){
            $response['success'] = false;
            $response['message'] = 'you checked out before ';
            $response['monthlyOutcome'] = $checkout;
            return response()->json($response, 400);
        }
        $attendSheet->update([
            'checkOut' => Carbon::now(),
            'hours' =>$minutes
        ]);
        $monthExists = monthlyOutcome::where('user_id',$user->id)->where('month',Carbon::now()->month)->first();
        if ($monthExists)
        {
           $monthExists->update(['hours'=>$minutes]);
        }else
        {
            $monthExists =  monthlyOutcome::create([
                'month'=>Carbon::now()->month,
                'year'=>Carbon::now()->year,
                'hours'=>$minutes,
                'user_id'=>$user->id
            ]);
        }

        $response['success'] = true;
        $response['message'] = 'thanks for checking out ';
        $response['monthlyOutcome'] = $monthExists;
        return response()->json($response, 200);
    }
}
