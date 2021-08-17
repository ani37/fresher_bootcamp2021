<?php


/**
 * Convert a phone number into a masked phone number.
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