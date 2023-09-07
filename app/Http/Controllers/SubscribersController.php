<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function index()
    {
        $user = auth('api')->user();
        $subscribers = $user->subscribers()->with('user')->get();
        return response()->json($subscribers);
    }
    public function store(Request $request)
    {
        $user = auth('api')->user();
        $user->subscribers()->create($request->all());

        return response()->json([
            'msg' => 'success'
        ]);
    }
}
