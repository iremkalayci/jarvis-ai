<?php

namespace App\Controllers;

class News extends BaseController
{
    public function index()
    {
        $apiKey = env('NEWS_API_KEY');

        $url = 'https://newsapi.org/v2/everything?q=artificial%20intelligence&language=en&sortBy=publishedAt&pageSize=6&apiKey=' . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JarvisAIProject/1.0');

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        $articles = $data['articles'] ?? [];

        return view('ai_news', [
            'articles' => $articles
        ]);
    }
}