<?php

namespace App\Http\Controllers;

use App\Models\Urls;
use Illuminate\Http\Request;

class UrlsController extends Controller
{
    public function __invoke(Urls $urls)
    {
        return view('urls', ['urls' => $urls]);
    }
}
