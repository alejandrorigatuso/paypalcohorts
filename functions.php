<?php

function readPaypalData($fileName) {
    if (($file = fopen("upload/" . $fileName, "r")) !== FALSE) {
        $row = 0;

        while (($csvRow = fgetcsv($file, ",")) !== FALSE) {

            if ($csvRow[4] == "Recurring Payment Received") {

                $time = strtotime($csvRow[0]);
                $data[$row] = array('payment_date' => $time, 'email' => $csvRow[10], 'amount' => $csvRow[7], 'country' => $csvRow[39], 'city' => $csvRow[37]);
                $row++;
            }
        }
        fclose($file);
        unlink("upload/" . $fileName);


        return $data;
    } else {
        return false;
    }
}

function sales($users, $cohort, $date) {
    $sum = 0;

    for ($i = 0; $i < count($users); $i++) {


        for ($p = 0; $p < count($users[$i]['payments']); $p++) {


            if (($users[$i]['cohort'] == $cohort) && ($users[$i]['payments'][$p]['date'] == $date)) {

                $sum = $sum + $users[$i]['payments'][$p]['amount'];
            }
        }
    }

    return $sum;
}

function search($array, $email) {
    $found = false;


    $pos = 0;
    for ($i = 0; $i < count($array); $i++) {

        if ($array[$i]['email'] == $email) {
            $found = true;
            $pos = $i;
            $i = count($array);
        }
    }

    return $pos;
}

function getInfo($sales) {

    $min = $sales[0]['payment_date'];
    $max = $min;


    foreach ($sales as $sale) {
        if ($sale['payment_date'] <= $min) {
            $startingTime = $sale['payment_date'];
        }

        if ($sale['payment_date'] >= $max) {
            $endTime = $sale['payment_date'];
        }
    }

    $date = date("Y-m", $startingTime);
    $year = date("Y", $startingTime);
    $month = date("m", $startingTime);

    $date_end = date("Y-m", $endTime);
    $year_end = date("Y", $endTime);
    $month_end = date("m", $endTime);

    $cohorts = (date("Y", $endTime - $startingTime) - 1969 - 1) * 12 + date("m", $endTime - $startingTime);

    $output = array(
        'date_start' => $date,
        'year_start' => (int) $year,
        'month_start' => (int) $month,
        'date_end' => $date_end,
        'year_end' => (int) $year_end,
        'month_end' => (int) $month_end,
        'cohorts' => $cohorts);



    return $output;
}

function organizePerUser($data) {
    $j = 0;
    $users = array();


    for ($i = 0; $i < count($data); $i++) {

        $pos = search($users, $data[$i]['email']);


        if (!$pos) {
// If the user was not found in the Users-Array then it's a new user, we'll assign a cohort.       
            $users[$j] = array('email' => $data[$i]['email'], 'count' => 1, 'index' => $j, 'country' => $data[$i]['country'], 'city' => $data[$i]['city']);

            $users[$j]['cohort'] = date("Y-m", $data[$i]['payment_date']);
            $users[$j]['cohort_time'] = $data[$i]['payment_date'];

//We'll assign a new payment to this user as well.
            $date = date("Y-m", $data[$i]['payment_date']);
            $amount = $data[$i]['amount'];

            $users[$j]['payments'][0] = array('date' => $date, 'amount' => $amount);


            $j++;
        } else {
// If we found the user, and we have the position then we'll assign a new payment to the user.

            $users[$pos]['count']++;

            $date = date("Y-m", $data[$i]['payment_date']);
            $amount = $data[$i]['amount'];

            array_push($users[$pos]['payments'], array('date' => $date, 'amount' => $amount));

            if ($data[$i]['payment_date'] < $users[$pos]['cohort_time']) {
                $users[$pos]['cohort'] = date("Y-m", $data[$i]['payment_date']);
                $users[$pos]['cohort_time'] = $data[$i]['payment_date'];
            }
        }
    }

    return $users;
}

function getYearMonth($startingYear, $startingMonth, $month) {

    $date_Year = $startingYear + floor((($startingMonth - 1) + $month) / 12);

    $date_Month = (($startingMonth - 1) + $month) % 12 + 1;

    if ($date_Month < 10) {
        $date_Month = '0' . $date_Month;
    }

    $date = $date_Year . '-' . $date_Month;

    return $date;
}

function organizeByCohort($users, $startingYear, $startingMonth, $cohorts) {

    $months = $cohorts;
    $data = array();


    for ($month = 0; $month < $months; $month++) {

        $date = getYearMonth($startingYear, $startingMonth, $month);

        $data[$month][0] = $date;

        for ($cohort = 0; $cohort < $cohorts; $cohort++) {

            $cohort_text = getYearMonth($startingYear, $startingMonth, $cohort);

            $sales = sales($users, $cohort_text, $date);

            $data[$month][$cohort] = $sales;
        }
    }

    return $data;
}

function decorateCohorts($data, $startingYear, $startingMonth) {


    $cohorts = count($data);


    $k = 0;
    foreach ($data as $line) {
        $rev = array_reverse($line);


        $month_text = getYearMonth($startingYear, $startingMonth, $k);
        array_push($rev, "$month_text");


        $rev = array_reverse($rev);

        $data[$k] = $rev;
        $k++;
    }


    $reverse = array_reverse($data);

    $header = array();
    $header[0] = "Month";
    for ($cohort = 1; $cohort <= $cohorts; $cohort++) {
        $month_text = getYearMonth($startingYear, $startingMonth, $cohort-1);

        array_push($header, "Cohort $month_text");
    }

    array_push($reverse, $header);
    $reverse = array_reverse($reverse);


    return $reverse;
}

function getShortTermRetention($data, $offset) {

    $cohorts = count($data);
    $months = $cohorts;

    $count = 0;
    $sum = 0;


    for ($cohort = 0; $cohort < $cohorts; $cohort++) {
        for ($month = 0; $month < $months; $month++) {

            if (($month > $cohort) && ($month <= $cohort + $offset)) {
                if ($data[$month][$cohort] <> 0) {
                    $sum+=$data[$month][$cohort];
                    $count++;
                }
            }
        }
    }

    return $sum / $count;
}

function getLongTermRetention($data, $offset) {

    $cohorts = count($data);
    $months = $cohorts;

    $count = 0;
    $sum = 0;


    for ($cohort = 0; $cohort < $cohorts; $cohort++) {
        for ($month = 0; $month < $months; $month++) {

            if (($month > $cohort + $offset)) {
                if ($data[$month][$cohort] <> 0) {
                    $sum+=$data[$month][$cohort];
                    $count++;
                }
            }
        }
    }

    return $sum / $count;
}

function getSalesRelativeToThePreviousMonth($data) {

    $retentions = array();
    $cohorts = count($data);
    $months = $cohorts;

    for ($cohort = 0; $cohort < $cohorts; $cohort++) {


        for ($j = 0; $j < $months; $j++) {


            if ($j == $cohort) {
                $retentions[$j][$cohort] = 1;
            } else {
                $calculo = $data[$j][$cohort] / $data[$j - 1][$cohort];

                if ($calculo) {
                    $retentions[$j][$cohort] = $calculo;
                } else {
                    $retentions[$j][$cohort] = 0;
                }
            }
        }
    }


    return $retentions;
}

////////////////////
//// Simulator /////
////////////////////

function createCohorts($cohorts, $retention, $newusers, $virality, $initialusers) {


    $data = array();

    $data[0][0]=$initialusers;

    for ($cohort = 0; $cohort < $cohorts; $cohort++) {
        for ($month = 0; $month < $cohorts; $month++) {

            if ($month == $cohort) {

                $total_users = getTotalUsers($data, $month - 1);

                $viralGrow[$month] = $total_users * $virality; //dependiente de la cantidad de usuarios
                $otherGrow[$month] = $newusers;

                $data[$month][$cohort] += $otherGrow[$month] + $viralGrow[$month];
            } elseif ($month > $cohort) {
                $data[$month][$cohort] = $data[$month - 1][$cohort] * $retention;
            } else {
                $data[$month][$cohort] = 0;
            }
        }
    }

    return $data;
}

function getTotalUsers($data, $month) {

    $cohorts = count($data);

    $sum = 0;

    if ($month >=0) {
        for ($cohort = 0; $cohort < $cohorts; $cohort++) {
            $sum = $sum + $data[$month][$cohort];
        }
    }


    return $sum;
}

?>
