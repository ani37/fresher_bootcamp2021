<?php


/**
 * Convert Camel cases all values of given array and return new array.
 * @param array $data The array of string.
 * @return array
 * @author aniket
 */
function toCamelCase($data)
{
    foreach ($data as &$word){
        // split into words, uppercase their first letter, join them,
        // lowercase the very first letter of the name
        $word = lcfirst(implode('', array_map('ucfirst', explode('_', $word))));
    }
    return $data;
}

$input = ["snake_case", "camel_case"];
$output = toCamelCase($input);
print_r ($output);