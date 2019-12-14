<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GenerateTokenController extends Controller
{
    public function __invoke(Request $request)
    {

        abort_unless($request->isXmlHttpRequest(), 403);

        $request->user()->forceFill([
            'api_token' => hash('sha256', Str::random(60))
        ])->save();

        Session::flash('success', 'Success Re-generate Api Key');
        return response()->json([
            'message' => 'success'
        ]);
    }
}
