<?php 
$title = "UIN FORM";
include "inc/head.php";
?>
<header class="">
	<?php 
include "inc/navbar.php";

if (isset($_GET['view'])) {
	include "viewSurvey.php";
} else {
	include "inc/banner.php";
}
?>
</header>