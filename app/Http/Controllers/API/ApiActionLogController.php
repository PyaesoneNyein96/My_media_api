<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiActionLogController extends Controller
{


    public function storeCount(Request $request){
        logger($request);

        $data = $this->collectData($request);
        ActionLog::create($data);

        $viewCount = ActionLog::where('post_id', $request->post_id)->count();


        return response()->json([
            'status' => 'success',
            'viewCount' => $viewCount
        ], 200);
    }

    private function collectData($request){

        return [
            'user_id' => $request->id,
            'post_id' => $request->post_id,
            'created_at'=> Carbon::now()

        ];

    }

}