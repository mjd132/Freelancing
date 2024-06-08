<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProposalsController extends Controller
{
    public function create()
    {
        return view('proposals.create');
    }

    public function store(Request $request, $projectId)
    {

    }

    public function show($id)
    {

    }
}
