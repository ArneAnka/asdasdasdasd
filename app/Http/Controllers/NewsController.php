<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __invoke(News $news)
    {
        return view('news', ['news' => $news->load(['similar' => function($q){
            return $q->limit(7);
        }])]);
    }
}
