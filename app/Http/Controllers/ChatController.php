<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;
use App\Services\OpenAI;
use GuzzleHttp\Client;

class ChatController extends Controller
{
    public function index()
    {
        return view('ai');
    }

    public function processMessage(Request $request)
    {
        $openAiKey = env('OPEN_API_KEY');
        //message is yunng vOPEN_API_KEYalue from message the ajax
        $message = $request->input('message');
        $response = Http::post('https://open-ai21.p.rapidapi.com/conversationgpt35', [
            'body' => json_encode([
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $message
                    ]
                ],
                "web_access" => false,
                "system_prompt" => "",
                "temperature" => 0.9,
                "top_k" => 5,
                "top_p" => 0.9,
                "max_tokens" => 256
            ]),
            'headers' => [
                'X-RapidAPI-Host' => 'open-ai21.p.rapidapi.com',
                'X-RapidAPI-Key' => '9ca90e22ddmshec8195c6d05690cp12fa7fjsne7d580803379',
                'content-type' => 'application/json',
            ],
        ]);

        return view('pages.your-view')->with('responseBody', $response->body());
    }
    public function handleRequest(Request $request)
    {
        // Check if it's a POST request
        $message = $request->input('message');
        echo $message;
    }
}
