
<?php
session_start();
if(session_destroy()){
echo "<script>
    location.replace('../index.php')</script>";
}
?>