<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function index(){
        $user = Auth::user();

        $projectAsEmp = Project::where('employer_id',$user->getAuthIdentifier());
        return view('userPanel');
    }

}
