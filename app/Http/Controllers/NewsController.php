<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsParserService;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index(Request $request, NewsParserService $parser)
    {
        $date = $request->input('date', date('Y-m-d'));
        $query = $request->input('query');

        $news = $parser->getNewsByDate($date);

       if ($query) {
         $queryLower = mb_strtolower($query);
          $news = array_filter($news, function ($item) use ($queryLower) {
        return mb_stripos($item->title, $queryLower) !== false;
    });
}

        

              

        return view('pages.home', compact('news', 'date', 'query'));
   

    }
}
