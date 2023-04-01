<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Players;
use App\Models\Teams;
use Yajra\DataTables\DataTables;
use Log;
class TeamsController extends Controller
{
    public function index()
    {
        return '/';
    }
    public function show($id)
    {
        
        return view('teams.show')->with('data',  $id);
    }
    public function teamAjax($id)
    {

        $teams = Players::where('team_id', $id)->orderBy('name', 'asc')->get();
        Log::info($teams);
        return Datatables::of($teams)
            ->make(true);
    }
}
