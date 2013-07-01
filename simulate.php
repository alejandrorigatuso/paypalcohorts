<?php

// Turn off all error reporting
error_reporting(0);

include "functions.php";

if ($_GET["cohorts"]) {
    $cohorts = $_GET["cohorts"];
    $retention = $_GET["retention"];
    $newusers = $_GET["newusers"];
    $virality = $_GET["virality"];
    $initialusers = $_GET["initialusers"];
} else {
    $cohorts = $argv[1];
    $retention = $argv[2];
    $newusers = $argv[3];
    $virality = $argv[4];
    $initialusers = $_GET["virality"];
}


$data = createCohorts($cohorts, $retention, $newusers, $virality,$initialusers);
$startingYear = date('Y');
$startingMonth = date('n');

//This function normalizes the data. Each month sales is expressed as a function of the previous month.
$cohort_data = getSalesRelativeToThePreviousMonth($data);

// To visualize the data, we have to add headers using the "decorateCohorts" function
$outputdata[1] = decorateCohorts($data, $startingYear, $startingMonth);


//Short term retention refers to the average retention on the first(s) months, (usually churn rates are higher during the first 
//month). This functions takes as an argument (the second argument) how many months are considered to calculate shortTermRetention.
$outputdata[2] = getShortTermRetention($cohort_data, 1);

//Long term retention refers to the average retention after the first(s) months. This functions takes as an argument (the second
//argument) how many months are considered to calculate shortTermRetention, and then it calculates LongTermRetentino.
$outputdata[3] = getLongTermRetention($cohort_data, 1);


echo json_encode($outputdata);
?>
