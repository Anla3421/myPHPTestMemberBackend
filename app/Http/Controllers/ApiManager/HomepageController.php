<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomepageController extends Controller
{
    public function topthreecurrency(Request $request){
        $topPlayer = DB::table('report')
        ->wherebetween("created_at", [date($request->starttime.' 00:00:00'), date($request->endtime.' 23:59:59')])
        ->where('profile',$request->profile)
        ->selectRaw('token,profile,sum(surplus) as total_surplus')
        ->groupBy('token')
        ->orderBy('total_surplus','desc')
        ->take(3)
        ->get();
        
        $currency_initial = DB::table('currency_initial')->get();
        $player = DB::table('player')->get();

        // var_dump($reports);
        return response()->json(['status' => 200,
            'msg' => 'success',
            'result' => [
                'topPlayer' => $topPlayer,
                'currency' => $currency_initial,
                'player' => $player,
            ],
        ]);
    }
}
