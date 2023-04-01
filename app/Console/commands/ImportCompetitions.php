<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FootballData;
use App\Models\Countries;
use App\Models\Competitions;
class ImportCompetitions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:competitions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description this will be called by the server every 5 minutes to update data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $footballData =  new FootballData;
        /** we calla areas first */
        $countries = $footballData->callCountry();
        foreach($countries as $country)
        {
            $newCountry = Countries::where('id',$country->country_id)->first();
            if ( is_null($newCountry))
            {
                $newCountry = new Countries;
                $newCountry->id =  $country->country_id;
                $newCountry->name =  $country->country_name;
                $newCountry->logo =  $country->country_logo;
            } else {
                $newCountry->name = $country->country_name;
                $newCountry->logo = $country->country_logo;
                
            }
            $newCountry->save();
        }

        
        $competitions = $footballData->callCompetition();
        foreach($competitions as $competition)
        {
            $newCompetition = Competitions::where('id',$competition->league_id)->first();
            if ( is_null($newCompetition))
            {
                $newCompetition = new Competitions;
                $newCompetition->id =  $competition->league_id;
                $newCompetition->name =  $competition->league_name;
                $newCompetition->logo =  $competition->league_logo;
                $newCompetition->country_id =  $competition->country_id;

            } else {
                $newCompetition->name = $competition->league_name;
                $newCompetition->logo = $competition->league_logo;
                $newCompetition->country_id =  $competition->country_id;
            }
            $newCompetition->save();
        }
    }
}
