<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewsletter;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $news = $request->all();

        $subs = Subscribers::get();

        foreach ($subs as $sub) {
            dispatch(new SendNewsletter($sub->email, $news));
        }

        return response()->json([
            'msg' => 'SUCCESS',
        ]);
    }
}
