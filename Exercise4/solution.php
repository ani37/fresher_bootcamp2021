<?php


function convert($data){

    $names = [];
    $ages = [];
    $city = [];
    foreach($data["players"] as $player){
        array_push($names,$player["name"]);
        array_push($ages,$player["age"]);
        array_push($city,$player["address"]);
    }

    echo "All names ,age and city into arrays each:\n";
    print_r($names);
    print_r($ages);
    print_r($city);

    echo "All unique names:\n";
    $names = array_unique($names);
    print_r($names);

    echo "The name of Persons with max age:\n";
    $maxValue = max($ages);
    $maxAgesPersons = [];
    foreach($data["players"] as $player){
        if($player["age"] == $maxValue){
            array_push($maxAgesPersons, $player["name"]);
        }
    }

    print_r($maxAgesPersons);
}





$json = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$obj = json_decode($json, true);
convert($obj);
