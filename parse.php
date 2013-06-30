
<?php


// Turn off all error reporting
error_reporting(0);


include "functions.php";


//////////////////////
//////////////////////
//////////////////////


if ($_GET["fname"]) {
    $filename = $_GET["fname"];
} else {
    $filename = $argv[1];
}

$outputdata = array();


//First, read paypal data and organize sales by month and user
$salesByMonthAndUser = readPaypalData($filename);


//Then, organize sales by user
$salesPerUser = organizePerUser($salesByMonthAndUser);


// Gather data about this paypal file (how many cohorts are there, when this started, when this finished).
$info = getInfo($salesByMonthAndUser);
$cohorts = $info['cohorts'];
$startingYear = $info['year_start'];
$startingMonth = $info['month_start'];


//Organize sales by cohort
$data = organizeByCohort($salesPerUser, $startingYear, $startingMonth, $cohorts);

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