<?php

// Retrieves alphanumeric characters and capitalizes them
function keyClean($key)
{
    return strtoupper(preg_replace("/[^a-zA-Z0-9]+/", "", $key));
}


// Translation of SQL date into 'month year' in French.
function dateToMonthYear($dateSql)
{
    $months = array(
        'Feb' => 'Février', 
        'Apr' => 'Avril', 
        'May' => 'Mai',
        'Jun' => 'Juin', 
        'Jul' => 'Juillet',
        'Aug' => 'Août',
        'Dec' => 'Décembre'
    );
    $dateObject = new DateTime($dateSql);
    $date = $dateObject->format('M Y');
    return str_replace(array_keys($months), array_values($months), $date);
}


// Convert minutes to hours + minutes.
function minToHourMin($time) {
    if ($time < 1) {return;}
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return $hours . 'h' . $minutes;
}


// Returns the format corresponding to the numeric value.
function fileFormat($var)
{
    $formats = array(
        'MP3', 
        'MP4', 
        'ZIP',
        'JPG',
        'PNG', 
        'PDF'
    );
    return $formats[intval($var)];
}

?>