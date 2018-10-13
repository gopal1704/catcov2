<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scheme;
class placeorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
$schemes = scheme::all();

return  view('placeorder', compact('schemes'));
    }
}
