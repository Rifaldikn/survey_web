<?php include "admin_head.php" ?>
<header class="header" role="banner">
    <h1 class="logo">
        <a href="dashboard">UIN
            <span>FORM</span>
        </a>
    </h1>
    <div class="nav-wrap">
        <nav class="main-nav" role="navigation">
            <div id="acc">
                <div id="ava">
                </div>
                <h5><?php echo ($_SESSION['username']) ?>
                    <br><?php if ($_SESSION['level_user'] == 1) {
                            echo ("(ADMIN)");
                        } else {
                            echo("(USER)");
                        } ?></h5>
                <ul class="list-inline unstyled accmenu list-hover-slide">
                    <li>
                        <a href="">Profile</a>
                    </li>
                    <li>
                        <a href="log-out">Log Out</a>
                    </li>
                </ul>
            </div>
            <ul class="unstyled list-hover-slide">
                <li>
                    <a href="surveys">My Surveys</a>
                </li>
                <li>
                    <a href="#">Work</a>
                </li>
                <?php 
                if ($_SESSION['level_user'] == 1) {
                    ?>
                <li>
                    <a href="#">Members
                    </a>
                </li>
                <?php 
            } ?>
                <li>
                    <a href="#">Blog</a>
                </li>
            </ul>
        </nav>
    </div>
</header>