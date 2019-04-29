<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\MilletAvailabilityLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilletAvailabilityLocationController extends Controller
{

    public function showAll()
    {
        $rows = MilletAvailabilityLocation::paginate(15);

        $arr = [];
        /*
         *
         * {"current_page":1,"data":[{"id":1,"name":"Organic Sphere","contact_name":"Sudhi Seshachala",
         * "contact_phone":"4082039960","address":"24910, Kuykendahl Road, Suite H, Tomball, TX 77375",
         * "address1":"<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"500\" id=\"gmap_canvas\" src=\"https:\/\/maps.google.com\/maps?q=24910%2C+Kuykendahl+Road%2C+Suite+H%2C+Tomball%2C+TX+77375&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"><\/iframe><a href=\"https:\/\/www.emojilib.com\">emojilib.com<\/a><\/div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}<\/style><\/div>"}],
         * "first_page_url":"http:\/\/192.168.64.2\/sdmobileapp\/public\/sdmobile\/api\/v1.0\/milletLocations?page=1",
         * "from":1,"last_page":1,"last_page_url":"http:\/\/192.168.64.2\/sdmobileapp\/public\/sdmobile\/api\/v1.0\/milletLocations?page=1",
         * "next_page_url":null,"path":"http:\/\/192.168.64.2\/sdmobileapp\/public\/sdmobile\/api\/v1.0\/milletLocations",
         * "per_page":15,"prev_page_url":null,"to":1,"total":1}
         *
         */
        $arr['current_page'] = $rows['current_page'];
        $arr['first_page_url'] = $rows['first_page_url'];
        $arr['next_page_url'] = $rows['next_page_url'];
        $arr['from'] = $rows['from'];
        $arr['last_page'] = $rows['last_page'];
        $arr['last_page_url'] = $rows['last_page_url'];
        $arr['per_page'] = $rows['per_page'];
        $arr['prev_page_url'] = $rows['prev_page_url'];
        $arr['to'] = $rows['to'];
        $arr['total'] = $rows['total'];

        foreach($rows as $row)
        {
            $obj = new \stdClass();

            $obj->	description = '<b>'.$row->contact_name.'</b></b><br>'.$row->contact_phone.'<br><div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q='.urlencode($row->address).'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com">emojilib.com</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>';
            $obj->	name = '<b>' .$row->	name . '</b>';


            $arr['data'][] =  $obj;

        }

        return response()->json($arr);
    }

    // function to geocode address, it will return false if unable to geocode address
    private static function geocode($address){

        // url encode the address
        $address = urlencode($address);

        // google map geocode api url
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBtSQJF_yrYDzyHG8jenfSm6TQK5scu1t0";
        echo $url;
        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);

        // response status will be 'OK', if able to geocode given address
        if($resp['status']=='OK'){

            // get the important data
            $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
            $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
            $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";

            // verify if data is complete
            if($lati && $longi && $formatted_address){

                // put the data in the array
                $data_arr = array();

                array_push(
                    $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
                );

                return $data_arr;

            }else{
                return false;
            }

        }

        else{
            echo "<strong>ERROR: {$resp['status']}</strong>";
            return false;
        }
    }
}