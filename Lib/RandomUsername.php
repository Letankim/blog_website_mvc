<?php
function randomUsername($string) {
    $pattern = " ";
    $firstPart = strstr(strtolower($string), $pattern, true);
    $secondPart = substr(strstr(strtolower($string), $pattern, false), 0, 3);
    $nrRand = rand(0, 100);
    $username = $firstPart.$secondPart.$nrRand;
    return $username;
}
?>