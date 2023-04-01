<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Players;
use App\Models\Teams;
use App\Models\FootballData;
use App\Models\Competitions;
class ImportTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $footballData = new FootballData;
        /** we calla teams*/
        $leagues = Competitions::all();
        foreach($leagues as $league)
        {
            $teams = $footballData->callTeams($league->id);
            foreach ($teams as $team) {
                $newTeam = Teams::where('id', $team->team_key)->first();
                if (is_null($newTeam)) {
                    $newTeam = new Teams;
                    $newTeam->id = $team->team_key;
                    $newTeam->name = $team->team_name;
                    $newTeam->image = $team->team_badge;
                    $players = $team->players;
    
                    foreach ($players as $player) {
                        // we get the player
                        $newPlayer = Players::where('id', $player->player_key)->first();
                        if (is_null($newPlayer)) {
                            // if player dont exist we create it
                            $newPlayer = new Players;
                            $newPlayer->id = $player->player_key;
                            $newPlayer->name = $player->player_name;
                            $newPlayer->team_id = $team->team_key;
                            $newPlayer->number = $player->player_number;
                            $newPlayer->type = $player->player_type;
                            $newPlayer->age = $player->player_age;
                            $newPlayer->games_played = $player->player_match_played == "" ? 0 : $player->player_match_played;
                            $newPlayer->goals_scored = $player->player_match_played == "" ? 0 : $player->player_goals;
                            
                        } else {
                            // if player exists we overwrite it
                            $newPlayer->name = $player->player_name;
                            $newPlayer->team_id = $team->team_key;
                            $newPlayer->number = $player->player_number;
                            $newPlayer->type = $player->player_type;
                            $newPlayer->age = $player->player_age;
                            $newPlayer->games_played = $player->player_match_played == "" ? 0 : $player->player_match_played;
                            $newPlayer->goals_scored = $player->player_match_played == "" ? 0 : $player->player_goals;
                        }
                        //we save our player if its new it wil push it , if alredy exists will update it
                        $newPlayer->save();
                    }
                } else {
                    $newTeam->name = $team->team_name;
                    $newTeam->image = $team->team_badge;
                    $players = $team->players;
                    foreach ($players as $player) {
                        // we get the player
                        $newPlayer = Players::where('id', $player->player_key)->first();
                        if (is_null($newPlayer)) {
                            // if player dont exist we create it
                            $newPlayer = new Players;
                            $newPlayer->id = $player->player_key;
                            $newPlayer->name = $player->player_name;
                            $newPlayer->team_id = $team->team_key;
                            $newPlayer->number = $player->player_number;
                            $newPlayer->type = $player->player_type;
                            $newPlayer->age = $player->player_age;
                            $newPlayer->games_played = $player->player_match_played == "" ? 0 : $player->player_match_played;
                            $newPlayer->goals_scored = $player->player_match_played == "" ? 0 : $player->player_goals;
                        } else {
                            // if player exists we overwrite it
                            $newPlayer->name = $player->player_name;
                            $newPlayer->team_id = $team->team_key;
                            $newPlayer->number = $player->player_number;
                            $newPlayer->type = $player->player_type;
                            $newPlayer->age = $player->player_age;
                            $newPlayer->games_played = $player->player_match_played == "" ? 0 : $player->player_match_played;
                            $newPlayer->goals_scored = $player->player_match_played == "" ? 0 : $player->player_goals;
                        }
                        //we save our player if its new it wil push it , if alredy exists will update it
                        $newPlayer->save();
                    }
                }
                $newTeam->league_id = $league->id;

                $newTeam->save();
            }
        }
     
    }
}