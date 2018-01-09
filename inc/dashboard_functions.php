<?php 
include "connect.php";
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM surveys ";
$query .= "WHERE user_id = '$user_id' ";
$survey = mysqli_query($conn, $query);



$countSurvey = mysqli_query($conn, "SELECT COUNT(survey_id) FROM surveys WHERE user_id = $user_id ");
$countSurvey = mysqli_fetch_array($countSurvey);

$countSurvey = $countSurvey[0];
// var_dump($countSurvey );

// var_dump($count_question);
// var_dump(mysqli_query($conn, $count_question));

if ($countSurvey > 0) {
    $count_question = "SELECT COUNT(user_id) FROM questions WHERE user_id = '$user_id' ";
    $count_question = mysqli_query($conn, $count_question);
    $count_question = mysqli_fetch_array($count_question);
    $count_question = $count_question[0];

// var_dump($count_question);


    $count_a = "SELECT COUNT(gender) FROM responden WHERE user_id = '$user_id' ";
    $count_a = mysqli_query($conn, $count_a);
    $count_a = mysqli_fetch_array($count_a);
    $count_a = $count_a;

    // var_dump($count_a);


    $count_responden = "SELECT COUNT(gender) FROM responden WHERE gender = 'male' ";
    $count_responden = mysqli_query($conn, $count_responden);
    $count_responden = mysqli_fetch_array($count_responden);
    $count_male = $count_responden[0];
// var_dump($count_responden );

    $count_responden = "SELECT COUNT(gender) FROM responden WHERE gender = 'female' ";
    $count_responden = mysqli_query($conn, $count_responden);
    $count_responden = mysqli_fetch_array($count_responden);
    $count_female = $count_responden[0];
// var_dump($count_responden );

    $count_a = $count_male + $count_female;
} else {
    $count_question = $count_a = $count_male = $count_female = 0;
}
// var_dump($user_id, $count_a);

?>