<?php 
// session_start();
include "inc/connect.php";

function deleteSurvey()
{
    global $conn, $user_id;

    $delete = $_GET['delete'];
    $query = "DELETE FROM surveys WHERE survey_id = '$delete' AND user_id='{$user_id}'";
    mysqli_query($conn, $query);
    // header("Location: surveys");
    echo "<script>window.location.href='surveys';</script>";
}

function editSurvey()
{
    global $conn, $user_id;
    // var_dump($user_id);
    $survey_id = $_GET['edit'];
    $query = "SELECT * FROM surveys WHERE survey_id = '$survey_id' AND user_id='$user_id'";
    $survey = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($survey)) {
        $survey_id = $row['survey_id'];
        $survey_title = $row['title'];
        $survey_description = $row['description'];
        $survey_startdate = $row['startdate'];
        $survey_enddate = $row['enddate'];
    }
    // var_dump($survey );
    if (mysqli_num_rows($survey) > 0) {
        $query_question = "SELECT * FROM questions WHERE survey_id = '$survey_id'  ";
        $questions = mysqli_query($conn, $query_question);
    // while ($row = mysqli_fetch_assoc($survey)) {
    //     $question_id = $row['survey_id'];
    //     $question_number = $row['question_number'];
    //     $question_text = $row['question_text'];
    // }
        if (isset($_POST['update'])) {
            updateSurvey();
        }
        ?>
<div id="createNew" class="container ">

    <form action="" method="post">
        <textarea value="" id="title" name="title" rows="1" class="expand col-10" placeholder="Survey Title"
            required><?php echo ($survey_title); ?></textarea>
        <textarea value="" name="description" rows="1" class="expand col-10" placeholder="Description of Survey"
            required><?php echo ($survey_description); ?> </textarea>
        <div class="date-picker">
            <h4>Duration</h4>
            <div class="d-flex form-inliner">
                <input value="<?php echo ("$survey_startdate"); ?>"class="col-4" type="text" class="" name="startDate" placeholder="start date"
                    onfocus="(this.type='date')" onblur="(this.type='text')" required>
                <h4>to</h4>
                <input value="<?php echo (" $survey_enddate "); ?>" class="col-4" type="text" class="" name="endDate" placeholder="end date"
                    onfocus="(this.type='date')" onblur="(this.type='text')" required>
            </div>
        </div>
        <div>
            <h4>Questions</h4>
            <ul id="createNewQuestionList">
                <?php 
                while ($buff = mysqli_fetch_assoc($questions)) {
                    ?>
                <li class="row questiongroup">
                    <h5><?php echo ($buff["question_number"]) ?></h5>
                    <textarea name="question[]" rows="1" class="expand col-8" placeholder="Question" required><?php echo ($buff['question_text']); ?>
                    </textarea>
                    <button type="button" class="mdr-btn mdr-red" id="deleteField">DELETE</button>
                </li>
                <?php

            }
            ?>
            </ul>
            <button type="button" class="mdr-btn mdr-blue" id="addNewField">ADD</button>
            <button type="submit" name="update" class="mdr-btn mdr-green">UPDATE</button>

        </div>
    </form>
</div>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<!-- <script src="js/jquery-3.2.1.min.js"></script> -->

<script type="text/javascript" src="js/jquery.textarea-expander.js"></script>
<script>
    var i = 2;
    $('#deleteField').live('click', function () {
        if (i > 2) {
            $('.row').remove();

            i--;
            console.log(i);
        };

        var h5 = document.querySelectorAll("#createNewQuestionList h5");
        // $(".head h3").html("your new header");
        for (var k = 0; k < h5.length; ++k) {
            h5[k].innerText = k + 1;
        }
    });


    var $ = function (selector) {
        return document.querySelector(selector);
    }

    $('#addNewField').onclick = function () {
        console.log(i);
        var html = document.createElement('li');
        html.setAttribute("class", "row questiongroup");
        html.innerHTML = '<h5>' + i + '</h5><textarea name="question[]' +
            '" rows="1" class="expand col-8" placeholder="Question "' +
            ' style="height: 34px; overflow: hidden; padding-top: 0px; padding-bottom: 0px;" required></textarea>';
        html.innerHTML += ' <button type="button" class="mdr-btn mdr-red" id="deleteField">DELETE</button>';
        // Append it and attach the event (via onclick)
        $('#createNewQuestionList').appendChild(html);
        // li.onclick = dynamicEvent;
        i++;
    };
</script>


<?php

} else {

    echo ("<h1>ACCESS DENIED</h1>");
}
}


function updateSurvey()
{
    global $conn;
    $survey_id = $_GET['edit'];
        // var_dump($_POST);
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));
    $startDate = mysqli_real_escape_string($conn, trim($_POST['startDate']));
    $endDate = mysqli_real_escape_string($conn, trim($_POST['endDate']));
    $user_id = $_SESSION["user_id"];
    $date = date("Y-m-d");
    
    
        // $survey_owner = $_SESSION["user_id"] . "|" . $_SESSION["username"];
        // var_dump($survey_owner);
        // $query = "INSERT INTO surveys (title,  description, startdate, enddate, user_id, date_created) ";
        // $query .= "VALUES ('{$title}', '{$description}', '{$startDate}', '{$endDate}', '{$user_id}', '$date' )";
        // mysqli_query($conn, $query);


    $query = "UPDATE surveys SET ";
    $query .= "title  = '{$title}', ";
    $query .= "description = '{$description}', ";
    $query .= "startdate   =  '{$startDate}', ";
    $query .= "enddate = '{$endDate}', ";
    // $query .= "user_id = '{$user_id}', ";
    $query .= "last_modified   = '{$date}', ";
    $query .= "status = 'active' ";
    $query .= "WHERE survey_id  = '{$survey_id}' ";
    mysqli_query($conn, $query);
    var_dump($title, $description, $startDate, $user_id, $date);


        // // var_dump($title, $user_id, $date);
        // $query = "SELECT * FROM surveys WHERE title='$title' AND user_id = '$user_id' AND date_created='$date' ";
        // $db_survey_id = mysqli_query($conn, $query);
        // // var_dump($db_survey_id);
        // $row = mysqli_fetch_assoc($db_survey_id);
        // var_dump($row);

    // $query = "UPDATE users SET ";
    // $query .= "user_firstname  = '{$user_firstname}', ";
    // $query .= "user_lastname = '{$user_lastname}', ";
    // $query .= "user_role   =  '{$user_role}', ";
    // $query .= "username = '{$username}', ";
    // $query .= "user_email = '{$user_email}', ";
    // $query .= "user_password   = '{$hashed_password}' ";
    // $query .= "WHERE user_id = {$the_user_id} ";

    $question_length = count($_POST['question']);
    for ($i = 0; $i < $question_length; $i++) {
        $question = mysqli_real_escape_string($conn, trim($_POST['question'][$i]));
        $question_number = $i + 1;
        // $query = "INSERT INTO questions (question_number, question_text, survey_id) ";
        // $query .= "VALUES ('{$question_number}', '$question', '{$row["survey_id"]}')";
            // var_dump($query);
        echo ("<br>");
        var_dump($question_number, $question);
        $query = "UPDATE questions SET ";
        $query .= "question_number  = '{$question_number}', ";
        $query .= "question_text = '{$question}' ";
        // $query .= "survey_id   =  '{$survey_id}', ";
        $query .= "WHERE survey_id  = '{$survey_id}' ";
        echo (mysqli_query($conn, $query));
        // echo (mysqli_error($conn));
            // var_dump($question);
            // echo("<br>");
    }
    header("Location: surveys");

}

function viewSurvey($survey_id)
{
    global $conn;
    // var_dump($user_id);
    $query = "SELECT * FROM surveys WHERE survey_id = '$survey_id' ";
    $survey = mysqli_query($conn, $query);
    // var_dump($survey);
    if ($count = mysqli_num_rows($survey) > 0) {
        $row = mysqli_fetch_assoc($survey);

        $survey_title = $row['title'];
        $survey_description = $row['description'];
        $survey_startdate = $row['startdate'];
        $survey_enddate = $row['enddate'];


        $query_question = "SELECT * FROM questions WHERE survey_id = '$survey_id'  ";
        $questions = mysqli_query($conn, $query_question);

    } else {

        return false;
    }
    return [$row, $questions, $count];
}

function answerResponden($survey_id, $data, $user_id)
{
    global $conn;
    $gender = $data['gender'];
    $status = $data['status'];
    $faculty = mysqli_real_escape_string($conn, trim($data['facultiy/division']));
    $duration = $data['duration-know'];
    // var_dump($gender, $status, $faculty, $duration);

    $query = 'INSERT INTO responden (user_id, survey_id, gender, status, faculty_division, experience) ';
    $query .= "VALUES ('{$user_id}', '{$survey_id}', '{$gender}', '{$status}', '{$faculty}', '{$duration}') ";
    $responden = mysqli_query($conn, $query);
    var_dump($query);;
    // var_dump($query);


    $count = count($data['satis']);
    // var_dump($count);
    for ($i = 0; $i < $count; $i++) {
        $number = $i + 1;
        $satisfaction = $data['satis'][$i + 1];
        $importance = $data['importance'][$i + 1];


        $querySatisfaction = "INSERT INTO detail_answer (id_survey, nomor_soal, type, answer) ";
        $querySatisfaction .= "VALUES ('{$survey_id}', '{$number}', '1', '{$satisfaction}')";
        $satisfaction = mysqli_query($conn, $querySatisfaction);

        $queryImportance = "INSERT INTO detail_answer (id_survey, nomor_soal, type, answer) ";
        $queryImportance .= "VALUES ('{$survey_id}', '{$number}', '2', '{$importance}')";
        $importance = mysqli_query($conn, $queryImportance);

    }
    // var_dump($querySatisfaction, $queryImportance);
    // echo "<script>alert('Thanks for Submited')<script>";
    echo "<script> alert('Thanks for Submiting'); window.location='dashboard'; </script>";
    // var_dump("tes");
}

?>