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

    public function test()
    {
        return response()->json([
            'success' => true,
            'message' => 'GET OK'
        ]);
    }

    public function getAll()
    {
        return Response::json($this->users);
    }

    public function get($id)
    {
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

    public function create(Request $request)
    {
        $user = [
            'id' => count($this->users) + 1,
            'name' => $request->input('name'),
            'age' => $request->input('age'),
        ];

        $this->users[$user['id']] = $user;

        return response()->json(
            [
                'success' => true,
                'user' => $user
            ],
            HttpFoundationResponse::HTTP_CREATED,
        );
    }

    public function update(Request $request, $id)
    {
        if (!isset($this->users[$id]))
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User not found'
                ],
                HttpFoundationResponse::HTTP_NOT_FOUND,
            );

        // si un campo no viene en el body, input permite especificar un valor por defecto
        $this->users[$id]['name'] = $request->input('name', $this->users[$id]['name']);
        $this->users[$id]['age'] = $request->input('age', $this->users[$id]['age']);

        return response()->json(
            [
                'success' => true,
                'user' => $this->users[$id],
            ],
            HttpFoundationResponse::HTTP_OK
        );
    }
}
