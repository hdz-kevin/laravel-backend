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

    public function get($id) {
        if (isset($this->users[$id])) {
            return response()->json($this->users[$id]);
        }

        return response()->json(
            ['message' => 'User not found'],
            404
        );
    }

    public function test() {
        return response()->json([
            'success' => true,
            'message' => 'GET OK'
        ]);
    }
}
