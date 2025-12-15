<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

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

        if (!isset($this->users[$id])) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User not found'
                ],
                HttpFoundationResponse::HTTP_NOT_FOUND,
            );
        }

        return response()->json($this->users[$id]);
    }

    public function test() {
        return response()->json([
            'success' => true,
            'message' => 'GET OK'
        ]);
    }
}
