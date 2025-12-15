<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function get() {
        return response()->json([
            'success' => true,
            'message' => 'GET /test OK'
        ]);
    }
}
