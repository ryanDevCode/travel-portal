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

    public function processMessage(Request $request){
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
            // Get the message from the request body

            // Process the message (e.g., perform some logic or database operations)
            // In this example, we simply return the message as the response
            // $response = ['message' => $message];

            // // Convert the response to JSON format
            // $jsonResponse = json_encode($response);

            // // Set the response headers
            // header('Content-Type: application/json');
            // http_response_code(200);

            // // Return the JSON response
            // echo $jsonResponse;

            // If you are using a response object, you can return it instead:
            // return $response->getBody();

    }
    //     $client = new \GuzzleHttp\Client();

    //     $response = $client->request('POST', 'https://open-ai21.p.rapidapi.com/conversationgpt35', [
    //         'body' => '{
    //         "messages": [
    //             {
    //                 "role": "user",
    //                 "content": "hello"
    //             }
    //         ],
    //         "web_access": false,
    //         "system_prompt": "",
    //         "temperature": 0.9,
    //         "top_k": 5,
    //         "top_p": 0.9,
    //         "max_tokens": 256
    //     }',
    //         'headers' => [
    //             'X-RapidAPI-Host' => 'open-ai21.p.rapidapi.com',
    //             'X-RapidAPI-Key' => '9ca90e22ddmshec8195c6d05690cp12fa7fjsne7d580803379',
    //             'content-type' => 'application/json',
    //         ],
    //     ]);

    //     echo $response->getBody();
    // }

    // public function processMessage(Request $request)
    // {
    //     $userMessage = $request->input('message');

    //     $client = new Client();
    //     $response = $client->request('POST', 'https://open-ai21.p.rapidapi.com/conversationgpt35', [
    //         'body' => '{
    //             "messages": [
    //                 {
    //                     "role": "user",
    //                     "content": "' . $userMessage . '"
    //                 }
    //             ],
    //             "web_access": false,
    //             "system_prompt": "",
    //             "temperature": 0.9,
    //             "top_k": 5,
    //             "top_p": 0.9,
    //             "max_tokens": 256
    //         }',
    //         'headers' => [
    //             'X-RapidAPI-Host' => 'open-ai21.p.rapidapi.com',
    //             'X-RapidAPI-Key' => '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', // Replace with your actual API key
    //             'content-type' => 'application/json',
    //         ],
    //     ]);

    //     $botMessage = json_decode($response->getBody())->data->messages[0]->content;

    //     return response()->json([
    //         'message' => $botMessage,
    //     ]);
    // }
    }
















    // protected $openAI;

    // public function __construct(OpenAI $openAI)
    // {
    //     $this->openAI = $openAI;
    // }

    // public function index()
    // {
    //     return view('ai');
    // }

    // public function askQuestion($question)
    // {
    //     $response = $this->openAI->askQuestion($question);

    //     return response()->json(['answer' => $response['choices'][0]['text']]);
    // }

    // /**
    //  * @param Request $request
    //  * @return string
    //  */
    // public function index (){
    //     return view('pages.assistant');
    // }
    // public function __invoke(Request $request): string
    // {

    //     try {
    //         /** @var array $response */
    //         $response = Http::withHeaders([
    //             "Content-Type" => "application/json",
    //             "Authorization" => "Bearer " . env('CHAT_GPT_KEY')
    //         ])->post('https://api.openai.com/v1/chat/completions', [
    //             "model" => $request->post('model'),
    //             "messages" => [
    //                 [
    //                     "role" => "user",
    //                     "content" => $request->post('content')
    //                 ]
    //             ],
    //             "temperature" => 0,
    //             "max_tokens" => 2048
    //         ])->body();
    //         return $response['choices'][0]['message']['content'];
    //     } catch (Throwable $e) {
    //         return "Chat GPT Limit Reached. This means too many people have used this demo this month and hit the FREE limit available. You will need to wait, sorry about that.";
    //     }
    // }
