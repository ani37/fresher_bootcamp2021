<?php


/**
 * Convert a multi-dimensional array into a single-dimensional array.
 * @param string $data The phone number string.
 * @return string
 * @author aniket
 */
function maskNumber($data)
{
    return substr_replace($data,"******",2,6);
}

$input = "9876543210";
$output = maskNumber($input);
print_r ($output);