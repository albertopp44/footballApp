<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Competitions;
use App\Models\Areas;
use App\Models\HistoryCompetition;
use Log;

class FootballData extends Model
{
  /* This modal is going to be used to handle the API requests
   */
  private string $apiKey = "";

  public function callCompetition()
  {

    $curl_options = array(
      CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_leagues&APIkey=" . $this->apiKey,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_CONNECTTIMEOUT => 5
    );

    $curl = curl_init();
    curl_setopt_array($curl, $curl_options);
    $result = curl_exec($curl);

    $result = json_decode($result);
    return $result;
  }
  public function callCountry()
  {
    $curl_options = array(
      CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_countries&APIkey=" . $this->apiKey,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_CONNECTTIMEOUT => 5
    );

    $curl = curl_init();
    curl_setopt_array($curl, $curl_options);
    $response = curl_exec($curl);
    Log::debug("debug", (array) json_decode($response));
    return json_decode($response);
  }
  public function callTeams($league_id)
  {
    $curl_options = array(
      CURLOPT_URL => "https://apiv3.apifootball.com/?action=get_teams&league_id=$league_id&APIkey=" . $this->apiKey,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_CONNECTTIMEOUT => 5
    );

    $curl = curl_init();
    curl_setopt_array($curl, $curl_options);
    $response = curl_exec($curl);
    Log::info($response);
    return json_decode($response);
  }
}