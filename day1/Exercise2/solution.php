<?php


/**
 * Convert a phone number into a masked phone number.
 * @param string $data The phone number string.
 * @return string
 * @author aniket
 */
function maskNumber($data, $start, $length)
{
    return substr_replace($data,"******",$start, $length);
}

$input = "9876543210";
$output = maskNumber($input, 2, 6);
print_r ($output);