<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\GenericData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenericDataController extends Controller
{

    public function getRecipes()
    {
        return response()->json(GenericData::where('type','=','recipe')->paginate(10));
    }

    public static function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function getMilletLocations()
    {
        $rows = GenericData::where('type','=','contact')->paginate(15);


        $rowsObj = (array) json_decode(json_encode($rows));


        $arr = [];
        $arr['current_page'] = $rowsObj['current_page'];
        $arr['first_page_url'] = $rowsObj['first_page_url'];
        $arr['next_page_url'] = $rowsObj['next_page_url'];
        $arr['from']        = $rowsObj['from'];
        $arr['last_page'] = $rowsObj['last_page'];
        $arr['last_page_url'] = $rowsObj['last_page_url'];
        $arr['per_page'] = $rowsObj['per_page'];
        $arr['prev_page_url'] = $rowsObj['prev_page_url'];
        $arr['to'] = $rowsObj['to'];
        $arr['total'] = $rowsObj['total'];

        foreach($rows as $row)
        {
            $obj = new \stdClass();

            $description = str_replace("\r\n", "", $row->description);
            //echo $description;
            if(self::isJson($description))
            {
                $contact = json_decode($description);

                $obj->description = '<img src="'.$row->image.'" width="100" height="200"><br>'.$contact->description. '<br>'
                                         .'<b>Contact:</b>'.$contact->contact.'<br><b>Phone:</b>'.$contact->phone
                                         .'<br><div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q='.urlencode($contact->address).'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com">emojilib.com</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>';
            }
            $obj->      name = '<b>' .$row->    name . '</b>';

            $arr['data'][] =  $obj;

        }

        return response()->json($arr);
    }

}