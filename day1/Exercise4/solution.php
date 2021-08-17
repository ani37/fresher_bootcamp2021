<?php

/**
 * get names of from json data
 * @param string $data The json string.
 * @return array
 * @author aniket
 */
function getNames($data){
    $names = [];

    foreach($data["players"] as $player){
        array_push($names,  $player["name"]);
    }

    return $names;
}

/**
 * get ages of from json data
 * @param string $data The json string.
 * @return array
 * @author aniket
 */
function getAges($data){
    $ages = [];

    foreach($data["players"] as $player){
        array_push($ages, $player["age"]);
    }

    return $ages;
}

/**
 * get cities of from json data
 * @param string $data The json string.
 * @return array
 * @author aniket
 */
function getCities($data){
    $cities = [];

    foreach($data["players"] as $player){
        array_push($cities, $player["address"]);
    }

    return $cities;
}

/**
 * get unique names
 * @param string $data The json string.
 * @return array
 * @author aniket
 */
function getUniqueNames($data){
    return array_unique(getNames($data));
}

/**
 * get max aged person names from json data
 * @param string $data The json string.
 * @return array
 * @author aniket
 */
function getMaxAgesPersons($data){
    $maxValue = max(getAges($data));

    $maxAgesPersons = [];
    foreach($data["players"] as $player){
        if($player["age"] == $maxValue){
            array_push($maxAgesPersons, $player["name"]);
        }
    }
    return $maxAgesPersons;
}

$json = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$obj = json_decode($json, true);

print_r(getNames($obj));
print_r(getAges($obj));
print_r(getCities($obj));
print_r(getUniqueNames($obj));
print_r(getMaxAgesPersons($obj));

