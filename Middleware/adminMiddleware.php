<?php

include("../controller/myRedFunction.php");

if (isset($_SESSION['email'])) {
    if ($_SESSION['role_as'] != 1) {
        redirect("../index.php", "You are not Authorized to view this page");
    }
} else {
    redirect("../login.php", "login to continue");
}

?>
