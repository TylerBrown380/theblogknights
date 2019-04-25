<?php
date_default_timezone_set("America/Boise");
require_once 'constants.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

if(isset($_POST['uid'], $_POST['message'])) {
        $uid = htmlentities($_POST['uid']);
        $date = date('Y/m/d h:i:s');
        $message = htmlentities($_POST['message']);

        $sql = "INSERT INTO comments (uid, date, message) 
        VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $uid, $date, $message);
        $result = mysqli_stmt_execute($stmt);
}
