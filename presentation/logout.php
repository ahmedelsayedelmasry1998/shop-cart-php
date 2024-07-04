<?php
session_start();
include_once("../master/sections/contact.php");
include_once("../master/sections/start.php");
include_once("../master/sections/mid.php");
if(! isset($_SESSION['email']))
{
    header("location:../index.php");
}else{
session_unset();
session_destroy();
header("location:../index.php");
}
?>

<?php
include_once("../master/sections/foot.php");
include_once("../master/sections/end.php");
?>