<?php
session_start();
include("./components/head.php");
include("./components/header.php");
if(isset($_SESSION['isadmin'])) {
?>


<?php
} else {
    echo "<center><h1 style='margin-top: 50px;'>U moet admin rechten hebben om hier in te loggen</h1></center>";
}
include("./components/footer.php");
?>
