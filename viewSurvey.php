<?php 
// echo ($_SESSION['user_id']);
include "surveyAction.php";

$survey_id = $_GET['view'];
$row = viewSurvey($survey_id);

if ($row == false) {
    echo ("<h1>Surveys Not Exist</h1>");
} else {
    ?>
<div class="container">
    <form action="" method="post" id="survey-form">
        <h2>
            <?php echo ($row[0]['title']) ?>
        </h2>
        <h5>
            <?php echo ($row[0]['description']) ?>
        </h5>
        <div class="form-group">
            <div class="responden-data">
                <h5>Gender</h4>
                    <div>
                        <input id="gender" class="radio-custom" name="gender" value="male" type="radio" checked required>
                        <label for="gender" class="radio-custom-label">Male</label>
                        <input id="gender1" class="radio-custom" name="gender" value="female" type="radio">
                        <label for="gender1" class="radio-custom-label">Female</label>
                    </div>
            </div>
            <div class="responden-data">
                <h5>Status in UIN Jakarta</h4>
                    <div>
                        <input id="status" class="radio-custom" name="status" value="student" type="radio" required>
                        <label for="status" class="radio-custom-label">Student</label>
                        <input id="status1" class="radio-custom" name="status" value="lecture" type="radio">
                        <label for="status1" class="radio-custom-label">Lecture</label>
                        <input id="status2" class="radio-custom" name="status" value="official" type="radio">
                        <label for="status2" class="radio-custom-label">Structural Officials</label>
                        <input id="status3" class="radio-custom" name="status" value="staff " type="radio">
                        <label for="status3" class="radio-custom-label">Staff</label>
                        <input type="text" name="facultiy/division" id="status4" placeholder="Facultiy/Division" required>
                    </div>
            </div>
            <div class="responden-data">
                <h5>How long have you joined with or know UIN Syarif Hidayatullah Jakarta</h4>
                    <div>
                        <input id="input" class="radio-custom" name="duration-know" value="1" type="radio" checked>
                        <label for="input" class="radio-custom-label"> &lt 1 year</label>
                        <input id="input1" class="radio-custom" name="duration-know" value="2" type="radio">
                        <label for="input1" class="radio-custom-label">1 - 5 year</label>
                        <input id="input2" class="radio-custom" name="duration-know" value="3" type="radio">
                        <label for="input2" class="radio-custom-label">5 - 10 year</label>
                        <input id="input3" class="radio-custom" name="duration-know" value="4" type="radio">
                        <label for="input3" class="radio-custom-label">&gt 10 year</label>


                    </div>
            </div>
        </div>
        <table class="container">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Question</th>
                    <th colspan="4">Satisfaction</th>
                    <th colspan="4">Importance</th>
                </tr>
                <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>

                    <th class="text-center break-line">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>

                </tr>
            </thead>
            <?php while ($buff = mysqli_fetch_assoc($row[1])) {
        // $i = 1;
                ?>
            <tr>
                <td class="number">
                    <?php echo ($buff['question_number']); ?>
                </td>
                <td class="text-left">
                    <?php echo ($buff['question_text']); ?>
                </td>
                <div class="">
                    <td>
                        <div class="user-choice">
                            <input id="satfac-1<?php echo ($buff['question_number']); ?>" class="radio-custom" name="satis[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=1 required>
                            <label for="satfac-1<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>

                    <td>
                        <div class="user-choice">
                            <input id="satfac-2<?php echo ($buff['question_number']); ?>" class="radio-custom" name="satis[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=2>
                            <label for="satfac-2<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>
                    <td>
                        <div class="user-choice">
                            <input id="satfac-3<?php echo ($buff['question_number']); ?>" class="radio-custom" name="satis[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=3>
                            <label for="satfac-3<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>
                    <td>
                        <div class="user-choice">
                            <input id="satfac-4<?php echo ($buff['question_number']); ?>" class="radio-custom" name="satis[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=4>
                            <label for="satfac-4<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>
                </div>
                <div class="">
                    <td class="break-line">
                        <div class="user-choice">
                            <input id="importance-1<?php echo ($buff['question_number']); ?>" class="radio-custom" name="importance[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=1 required>
                            <label for="importance-1<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>
                    <td>
                        <div class="user-choice">
                            <input id="importance-2<?php echo ($buff['question_number']); ?>" class="radio-custom" name="importance[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=2>
                            <label for="importance-2<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>
                    <td>
                        <div class="user-choice">
                            <input id="importance-3<?php echo ($buff['question_number']); ?>" class="radio-custom" name="importance[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=3>
                            <label for="importance-3<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>
                    <td>
                        <div class="user-choice">
                            <input id="importance-4<?php echo ($buff['question_number']); ?>" class="radio-custom" name="importance[<?php echo ($buff['question_number']); ?>]"
                                type="radio" value=4>
                            <label for="importance-4<?php echo ($buff['question_number']); ?>" class="radio-custom-label"></label>
                        </div>
                    </td>
                </div>
            </tr>
            <?php 
        }
        ?>
        </table>


        <?php
        if (isset($_SESSION['user_id'])) {

            ?>
            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary nav-link col-1">Submit</button>
            </div>
            <?php 
        } else { ?>
            <div class="d-flex justify-content-center">
                <a type="button" href="sign-in" class="btn btn-primary nav-link col-1 ">
                    Submit
                </a>
            </div>
            <?php 
        } ?>
    </form>
</div>

<?php 
}
// print_r($_POST);
// var_dump($_SESSION['user_id']);
// var_dump($survey_id);
if (isset($_POST['submit'])) {
    answerResponden($survey_id, $_POST, $_SESSION['user_id']);
    // var_dump($survey_id, $_POST, $_SESSION);
}
?>