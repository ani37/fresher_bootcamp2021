<?php

/**
 * Convert a multi-dimensional array into a single-dimensional array.
 * @author aniket
 * @param  array $input The multi-dimensional array.
 * @return array
 */
function arrayFlatten( $input ) {

    $result = array();

    foreach ($input as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, arrayFlatten($value));
        } else {
            $result = array_merge($result, array($key => $value));
        }
    }

    return $result;
}

$input = [2, 3, [4,5], [6,7], 8];
$output = arrayFlatten($input);
print_r ($output);