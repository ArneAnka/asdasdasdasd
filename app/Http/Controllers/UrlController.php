<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function __invoke(Url $urls)
    {
        return view('urls', ['urls' => $urls]);
    }
}
