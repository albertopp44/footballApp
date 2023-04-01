<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;
use App\Models\Competitions;
use Yajra\DataTables\DataTables;
use App\Models\Teams;
use Log;
use App\Models\Players;

class CompetitionsController extends Controller
{
    public function index()
    {
        return view('competitions.index');
    }
    public function show($competitionId)
    {
        return view('competitions.show')->with('data', $competitionId);
    }
    public function competitionIndexAjax(Request $request)
    {

        if ($request->ajax()) {
            $data = Competitions::orderBy('name', 'asc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('country_name', function ($row) {
                    /*** we get areas name */
                    $areaName = Countries::where('id', $row->country_id)->value('name');
                    return is_null($areaName) ? 'Country name not found' : $areaName;
                })
                ->addColumn('country_logo', function ($row) {
                    /*** we get areas name */
                    $areaName = Countries::where('id', $row->country_id)->value('logo');
                    return is_null($areaName) ? 'Country logo not found' : $areaName;
                })

                ->addColumn('actions', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function competitionAjax($id)
    {

        $teams = Teams::where('league_id', $id)->orderBy('name', 'asc')->get();
        return Datatables::of($teams)
            ->addIndexColumn()
            ->addColumn('players_games', function ($row) {
                return Players::where('team_id', $row->id)->sum('games_played');

            })
            ->addColumn('players_goals', function ($row) {
                return Players::where('team_id', $row->id)->sum('goals_scored');

            })

            ->addColumn('actions', function ($row) {
                return $row->id;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}