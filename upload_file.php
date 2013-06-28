<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$allowedExts = array("csv");
$extension = end(explode(".", $_FILES["file"]["name"]));

if (($_FILES["file"]["size"] < 5000000)
        && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $newfilename = generateRandomString(10);
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newfilename);
        //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
} else {
    echo "Invalid file";
}



$filename = $newfilename;

header("Location: " . $_SERVER['HTTP_REFERER'] . "?fname=$filename");
?>