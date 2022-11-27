<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function show($slug)
    {
        $status = Status::query()->where('slug', $slug)->firstOrFail();
        $products = $status->products()->paginate(10);
        return view('statuses.show', compact('status', 'products'));
    }
}

