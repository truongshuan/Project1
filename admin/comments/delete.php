<?php
session_start();
require '../connection.php';
if (isset($_GET['id_reply'])) {
    $id = $_GET['id_reply'];
    $ma_bl = $_SESSION['ma_bl'];
    $sql = "DELETE FROM phan_hoi WHERE id= '$id'";
    $query = mysqli_query($con, $sql);
    header("location: reply.php?id_comment=$ma_bl");
    echo '<script type="text/javascript">
    msgg("Deleted Reply Successfully!");
    </script>';
}