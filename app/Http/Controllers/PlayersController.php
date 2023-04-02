<?php

namespace App\Http\Controllers;


use App\Models\Players;
use App\Models\Teams;
use Yajra\DataTables\DataTables;
class PlayersController extends Controller
{
    public function index()
    {
        return view('players.index');
    }
    public function playersAjax()
    {

        $data = Players::orderBy('name', 'asc')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('team_name', function ($row) {

                $team = Teams::where('id', $row->team_id)->value('name');
                return is_null($team) ? 'Country name not found' : $team;
            })
            ->addColumn('team_image', function ($row) {
                $image = Teams::where('id', $row->team_id)->value('image');
                return is_null($image) ? 'Country logo not found' : $image;
            })
            ->make(true);

    }
}