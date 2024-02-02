<?php

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://open-ai21.p.rapidapi.com/conversationgpt35', [
	'body' => '{
    "messages": [
        {
            "role": "user",
            "content": ""
        }
    ],
    "web_access": false,
    "system_prompt": "",
    "temperature": 0.9,
    "top_k": 5,
    "top_p": 0.9,
    "max_tokens": 256
}',
	'headers' => [
		'X-RapidAPI-Host' => 'open-ai21.p.rapidapi.com',
		'X-RapidAPI-Key' => '9ca90e22ddmshec8195c6d05690cp12fa7fjsne7d580803379',
		'content-type' => 'application/json',
	],
]);

echo $response->getBody();


// {
//     "result": "The tallest mountain in the world is Mount Everest, which stands at an elevation of 8,848 meters (29,029 feet) above sea level. It is located in the Mahalangur subrange of the Himalayas and lies on the border between Nepal and Tibet.",
//     "status": true,
//     "server_code": 1
//   }
// result:"The tallest mountain in the world is Mount Everest, which stands at an elevation of 8,848 meters (29,029 feet) above sea level. It is located in the Mahalangur subrange of the Himalayas and lies on the border between Nepal and Tibet."
// status:true
// server_code:1
// <?php

// namespace App\Services;

// use GuzzleHttp\Client;

// class OpenAI
// {
//     protected $apiUrl = 'https://api.openai.com/v1/';

//     protected $apiKey;

//     public function __construct()
//     {
//         $this->apiKey = config('services.openai.api_key');
//     }

//     public function askQuestion($question)
//     {
//         $client = new Client();

//         $response = $client->post($this->apiUrl . 'completions', [
//             'headers' => [
//                 'Content-Type' => 'application/json',
//                 'Authorization' => 'Bearer ' . $this->apiKey,
//             ],
//             'json' => [
//                 'prompt' => $question,
//                 'max_tokens' => 100,
//             ],
//         ]);

//         return json_decode($response->getBody(), true);
//     }
// }
