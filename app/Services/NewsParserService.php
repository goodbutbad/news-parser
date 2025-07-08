<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\News\News;

class NewsParserService
{
    public function getNewsByDate($date)
    {
        $client = new Client();
        $formattedDate = date('Y-m-d', strtotime($date));

        $url = 'https://kaktus.media/';
        $response = $client->get($url, [
            'query' => [
                'lable' => 8,
                'date' => $formattedDate,
                'order' => 'time',
            ],
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36',
            ],
        ]);

        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);
        $newsItems = [];

        $articles = $crawler->filter('.ArticleItem');

        $articles->each(function (Crawler $node) use (&$newsItems, $date) {
            $titleNode = $node->filter('.ArticleItem--name');
            $title = $titleNode->count() ? trim($titleNode->text()) : '';

            $urlNode = $titleNode->count() ? $titleNode->link() : null;
            $url = $urlNode ? $urlNode->getUri() : '';

            $imageNode = $node->filter('img');
            $image = $imageNode->count() ? $imageNode->attr('src') : null;


            if ($title && $url) {
                $newsItems[] = new News($date, $title, $url, $image);
            }
        });


        return $newsItems;
    }
}
