<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
        public function index()
    {
        $policies = Policy::all();
        return view('website.policy', compact('policies'));
    }
}
