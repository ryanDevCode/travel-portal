<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class Translator extends Component
{
    public $from_language = '';
    public $to_language = 'en';
    public $languages = [];
    public $translation = '';
    public $text_to_translate = '';
    public function mount()
    {
        $this->fetchLanguages();
    }

    public function fetchLanguages()
    {
        $fileContents = file_get_contents(app_path('Livewire/languages.json'));
        $this->languages = json_decode($fileContents, true);
    }

    public function translate()
    {
        $client = new Client([
            'base_uri' => 'https://google-translate1.p.rapidapi.com/',
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                'Accept-Encoding' => 'application/gzip',
                'X-RapidAPI-Key' => env('TRANSLATOR_KEY'), // Replace with your API key
                'X-RapidAPI-Host' => 'google-translate1.p.rapidapi.com',
            ],
        ]);

        $response = $client->post('language/translate/v2', [
            'form_params' => [
                'q' => $this->text_to_translate,
                'target' => $this->to_language,
                'source' => $this->from_language,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);
        $this->translation = isset($responseData['data']['translations'][0]['translatedText']) ? $responseData['data']['translations'][0]['translatedText'] : '';
    }
    public function render()
    {
        return view('livewire.translator');
    }
}
