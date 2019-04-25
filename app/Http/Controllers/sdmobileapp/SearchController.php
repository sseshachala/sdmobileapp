<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\MilletDietForCancer;
use App\sdmobileapp\MilletDietForDisease;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getFilterTypes() {
        return ['ailment_or_disease'=> 'Ailment', 'cancer_type'=>'Cancer Type'];
    }

    public function index() {
        $html ='<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url(\'https://www.w3schools.com/w3images/forestbridge.jpg\');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
    <p>Logo</p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p>35 days left</p>
  </div>
  <div class="bottomleft">
    <p>Some text</p>
  </div>
</div>

</body>
</html>';
        return $html;
    }

    public function doSearch($filterType, $searchTerm) {

        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        switch ($filterType)
        {
            case 'ailment_or_disease': return response()->json(MilletDietForDisease::filter($searchTerm), 200, $header, JSON_UNESCAPED_UNICODE); break;
            case 'cancer_type': return response()->json(MilletDietForCancer::filter($searchTerm), 200, $header, JSON_UNESCAPED_UNICODE); break;
        }
    }
}