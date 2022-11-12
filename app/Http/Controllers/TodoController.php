<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function todosList(){
        $guzzle = new \GuzzleHttp\Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
        try {
            $raw_response = $guzzle->get('todos');

            $response = $raw_response->getBody()->getContents();
            $result = json_decode($response);

            return view('todos.index', ['todosList' => $result]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            dd($e->getMessage());
            return back()->with('message', $e->getMessage());
        }
    }
}
