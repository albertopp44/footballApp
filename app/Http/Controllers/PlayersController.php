<?php

namespace App\Http\Controllers;


use App\Models\Players;
use App\Models\Teams;
use Yajra\DataTables\DataTables;
use Log;
class PlayersController extends Controller
{
    public function index()
    {
        return view('players.index');
    }
    public function playersAjax()
    {

        $data = Players::where("games_played",">",25)->orderBy('goals_scored', 'asc')->get();
       // Log::info($data);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('team_name', function ($row) {
                $team = Teams::where('id', $row->team_id)->value('name');
                return is_null($team) ? 'Team  name not found' : $team;
            })
            ->addColumn('team_image', function ($row) {
                $image = Teams::where('id', $row->team_id)->value('image');
                return is_null($image) ? 'Team logo not found' : $image;
            })
            ->make(true);

    }
}