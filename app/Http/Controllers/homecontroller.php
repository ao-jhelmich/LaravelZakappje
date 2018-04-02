<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Book\Mainrequirements;
use Illuminate\Support\Facades\Auth;
use App\Model\Book\Ranks;


class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $mainrequirementOfTheDay = Mainrequirements::where('ModFlag', 2)->get();
        $mrName = '';

        if(Auth::check()){
        foreach ($mainrequirementOfTheDay as $key => $value) {
            if ($value->mainrequirements_rank_id == auth()->user()->users_rank_id OR $value->mainrequirements_rank_id == 4) {
                    $mrName = $value->mainrequirements_name;
                }  
            }
        }
        
        return view('home', compact('mainrequirementOfTheDay', 'mrName'));
    }

    public function uitlegIndex()
    {
    	return view('uitleg.uitleg');
    }
}
