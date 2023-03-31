<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Competitions;
use App\Models\Areas;


class FootballData extends Model
{
  /* This modal is going to be used to handle the API requests
   */
  protected $apiKey;
  public function __contruct()
  {
    $this->apiKey = "3dbac9004956440981d8d0dbbc4befe8";
  }

  public function callCompetition($code)
  {
    $curl = curl_init();
    curl_setopt_array(
      $curl,
      array(
        CURLOPT_URL => "http://api.football-data.org/v4/competitions/" . $code,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => '',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'accept: application/json',
          'X-Auth-Token: ' . $this->apiKey
        )
      )
    );
    $response = json_decode(curl_exec($curl));
    curl_close($curl);
    /*inside competition we have to store 
    table area:
    id : area->id
    name : area->name
    code : area->code
    table competition
    id : competition->id
    name: ''->name
    code: ''->code
    type: ''->type
    numberOfAvailableSeasons: ''->numberOfAvailableSeasons
    this is the information we have store from the API CALL into our db
    */
    foreach ($response->competitions as $competition) {
      /*we create object of areas using his modal to sotre information in our DB*/

      $newArea = new Areas;
      $newArea->id = $competition->area->id;
      $newArea->name = $competition->area->name;
      $newArea->code = $competition->area->code;
      $newArea->save();

      /*we create object of competitons using his modal to store the information in our DB*/
      $newCompetition = new Competitions;
      /*we assign the values of each competition that our API CALL has return*/
      $newCompetition->id = $competition->id;
      $newCompetition->name = $competition->name;
      $newCompetition->code = $competition->code;
      $newCompetition->type = $competition->type;
      $newCompetition->numberOfAvailableSeasons = $competition->numberOfAvailableSeasons;
      $newCompetition->area_id = $newArea->id;
      $newCompetition->save(); /*we save it in our db*/
    }

  }

}