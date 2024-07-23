<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class ChatbotComponent extends Component
{
    public $chatHistory = [];
    public $userMessage = '';
    public $aiResponse = '';
    public $isWaitingForResponse = false;

    public function mount()
    {
        // Initial greeting
        $this->chatHistory[] = ['role' => 'ai', 'content' => 'Hi, I\'m RKive, your travel companion! '];
    }

    public function sendMessage()
    {
        // Prepend "Act as a travel advisor" to user message
        $this->userMessage = "Act as a travel advisor. " . $this->userMessage;

        // Store user message in chat history
        $this->chatHistory[] = ['role' => 'user', 'content' => $this->userMessage];
        $this->userMessage = '';
        $this->isWaitingForResponse = true;

        // Call API to get AI response
        try {
            $client = new Client();
            $response = $client->post('https://open-ai21.p.rapidapi.com/conversationgpt35', [
                'headers' => [
                    'X-RapidAPI-Host' => 'open-ai21.p.rapidapi.com',
                    'X-RapidAPI-Key' => env('AI_KEY'), // Replace with your actual API key
                    'content-type' => 'application/json'
                ],
                'json' => [
                    'messages' => $this->chatHistory,
                    'web_access' => false,
                    'system_prompt' => '',
                    'temperature' => 0.9,
                    'top_k' => 5,
                    'top_p' => 0.9,
                    'max_tokens' => 256
                ]
            ]);

            $responseData = json_decode($response->getBody(), true);
            $this->aiResponse = $responseData['result'];
            $this->chatHistory[] = ['role' => 'ai', 'content' => $this->aiResponse];
        } catch (\Exception $e) {
            // Handle API errors or exceptions
            $this->aiResponse = "Sorry, I'm having trouble connecting to the AI at the moment. Please try again later.";
        }
    }


    public function render()
    {
        return view('livewire.chatbot-component');
    }
}
