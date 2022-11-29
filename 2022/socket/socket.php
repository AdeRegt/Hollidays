<?php 
    $listurl = __DIR__ . "/data/";
    if(isset($_POST["roomname"])){
        $searchid = md5(" 789uS08S&*D" . date("Y-m-d H:i:s") . "Z");
        file_put_contents($listurl . $searchid . ".json",json_encode(Array( 
            "name" => $_POST["roomname"],
            "date" => date("Y-m-d H:i:s"),
            "id" => $searchid
        )));
        die(json_encode(Array( "error" => null , "data" => $searchid )));
    }else{
        $lijst = Array();
        foreach(scandir($listurl) as $gz){
            if(in_array($gz,Array(".",".."))){
                continue;
            }
            $dat = (Array)json_decode(file_get_contents($listurl . $gz));
            array_push($lijst,Array("name"=>$dat["name"],"id"=>$dat["id"]));
        }
        die(json_encode(Array( "error" => null , "data" => $lijst )));
    }
