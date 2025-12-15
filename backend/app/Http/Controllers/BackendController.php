<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function get() {
        return response()->json([
            'success' => true,
            'message' => 'GET OK'
        ]);
    }

    public function param(int $id = -1) {
        // if id param is not received, $id will be -1

        return response()->json([
            'success' => true,
            'message' => 'GET OK',
            'id' => $id
        ]);
    }
}
