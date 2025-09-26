<?php

namespace App\Http\Controllers\Site;

use App\Models\Team;
use App\Models\OurValue;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AbotUsController extends Controller
{


    public function index(): View
    {

        $ourValues = OurValue::all();
        $teams = Team::all();
        return view('site.about.index', [
            'ourValues' => $ourValues,
            'teams' => $teams
        ]);
    }
}
