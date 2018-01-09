<?php 

$title = "Surveys";
include "admin_navigation.php";
include "surveyAction.php";
// var_dump($_SESSION['user_id']);
$query = "SELECT * FROM surveys where user_id = '$user_id' ";
$result = mysqli_query($conn, $query);
$surveyCount = mysqli_num_rows($result);

?>
<div id="page-wrapper" class="">
    <?php 
        // var_dump(date("Y-m-d"));
    if (isset($_GET['delete'])) {
        deleteSurvey();
    } elseif (isset($_GET['result'])) {
        include "result.php";
    } else if (isset($_GET['edit'])) {
        editSurvey();
    } else {
        // var_dump(($_POST));
        if (isset($_GET['source'])) {
            include "{$_GET['source']}.php";
        } else {
            ?>
    <h4>All Surveys:
        <?php if ($surveyCount > 10) {
            echo ("10");
        } else {
            echo ($surveyCount);
        }; ?> of
        <?php echo ($surveyCount); ?>
    </h4>
    <div class="sort">
        <form action="" method="get">
            <div class="form-inline">
                <div class="form-group">
                    <label for="exampleSelect1">
                        <h5>Sort by</h5>
                    </label>
                    <select class="form-control" id="sortby">
                        <option>Name</option>
                        <option>Date</option>
                        <option>Status</option>
                    </select>
                    <select class="form-control" id="sortby">
                        <option>Ascending</option>
                        <option>Descending</option>
                    </select>
                    <button class="btn">Appy</button>
                </div>
            </div>
        </form>
    </div>

    <table class="">
        <!-- <caption>Employee Information</caption> -->
        <thead>
            <tr>
                <th scope="col">TITLE</th>
                <th scope="col">MODIFIED</th>
                <th scope="col">RESPONSES</th>
                <th scope="col">RESULT</th>
                <th scope="col">STATUS</th>
                <th scope="col" colspan="4">ACTION</th>
                <!-- <th scope="col">MORE</th> -->
            </tr>
        </thead>

        <tbody>
            <?php 
            while ($buff = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td class="title">

                    <a href="?result=<?php echo ($buff['survey_id']) ?>">
                        <?php echo ($buff['title']) ?>
                    </a>

                </td>
                <td>
                    <?php echo ($buff['last_modified']) ?>
                </td>
                <td>
                    <?php echo ($buff['responses']) ?>
                </td>
                <td>
                    <?php echo ($buff['result']) ?>
                </td>
                <td>
                    <?php
                    if (strtotime($buff['enddate']) < time()) {
                        echo ("Finished");
                    } else if (strtotime($buff['startdate']) > time()) {
                        echo ("Active Soon");
                    } else {
                        echo ("Active");
                    }
                    ?>
                </td>
                <td>
                    <a href="surveys?edit=<?php echo ($buff['survey_id']); ?>" class="btn mdr-btn mdr-blue">
                        EDIT
                    </a>
                </td>
                <td>
                    <a href="?delete=<?php echo ($buff['survey_id']); ?>" class="btn btn mdr-btn mdr-red">
                        DELETE
                    </a>
                </td>
                <td>
                    <a href="index?view=<?php echo ($buff['survey_id']); ?>" class="btn mdr-btn mdr-green"> VIEW </a>
                </td>
                <td>
                    <a href="share?share=<?php echo ($buff['survey_id']); ?>" class="show-modal btn mdr-btn mdr-yellow">SHARE</a>
                </td>

            </tr>
            <?php 
        } ?>
        </tbody>
    </table>
    <a href="?source=form_template" class="btn btn-create">+ Create Survey</a>


</div>
</div>



<script>
    document.title = "<?php echo $title ?>";
</script>
<?php 
}
} ?>


</div>


</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="js/jquery-3.2.1.min.js"></script> -->

</body>

</html>