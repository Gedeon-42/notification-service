<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\ValidateOrderRequest;
use App\Jobs\OrderCompletedEmail;

class NotificationController extends Controller
{
    //
    public function orderCompleted(ValidateOrderRequest $request)
    {
        $data = $request->validated();
        OrderCompletedEmail::dispatch($data);
        return response()->json([
            'message' => 'Notification sent in que'
        ]);
    }
}
