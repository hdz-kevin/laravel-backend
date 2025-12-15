<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BackendController extends Controller
{
    private array $users = [
        1 => ['name' => 'Anna', 'age' => 21],
        2 => ['name' => 'Jacobs', 'age' => 19],
        3 => ['name' => 'Juan', 'age' => 35],
    ];

    public function getAll() {
        return Response::json($this->users);
    }

    public function test() {
        return response()->json([
            'success' => true,
            'message' => 'GET OK'
        ]);
    }

    public function get(int $id = -1) {
        // if id param is not received, $id will be -1

        return response()->json([
            'success' => true,
            'message' => 'GET OK',
            'id' => $id
        ]);
    }
}
