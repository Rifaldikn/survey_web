<?php 
session_start();
include "inc/connect.php";

if (isset($_POST)) {
    // var_dump($_POST);
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));
    $startDate = mysqli_real_escape_string($conn, trim($_POST['startDate']));
    $endDate = mysqli_real_escape_string($conn, trim($_POST['endDate']));
    $user_id = $_SESSION["user_id"];
    $date = date("Y-m-d");


    // $survey_owner = $_SESSION["user_id"] . "|" . $_SESSION["username"];
    // var_dump($survey_owner);
    $query = "INSERT INTO surveys (title,  description, startdate, enddate, user_id, date_created) ";
    $query .= "VALUES ('{$title}', '{$description}', '{$startDate}', '{$endDate}', '{$user_id}', '$date' )";
    mysqli_query($conn, $query);
    // var_dump($title, $user_id, $date);
    $query = "SELECT * FROM surveys WHERE title='$title' AND user_id = '$user_id' AND date_created='$date' ";
    $db_survey_id = mysqli_query($conn, $query);
    // var_dump($db_survey_id);
    
    $row = mysqli_fetch_assoc($db_survey_id);
    var_dump($row);

    $question_length = count($_POST['question']);
    for ($i = 0; $i < $question_length; $i++) {
        $question = mysqli_real_escape_string($conn, trim($_POST['question'][$i]));
        $question_number = $i + 1;
        $query = "INSERT INTO questions (question_number, question_text, survey_id) ";
        $query .= "VALUES ('{$question_number}', '$question', '{$row["survey_id"]}')";
        // var_dump($query);
        mysqli_query($conn, $query);
        // var_dump($question);
        // echo("<br>");
    }
    header("Location: dashboard");
} else {
    header("Location: dashboard");
}
?>