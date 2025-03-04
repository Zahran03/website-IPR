<?php 
session_start();
if( !isset($_SESSION["id"]) ) {
    header("Location: login.php");
    exit;
}
require "Backend/functions.php";
$id = $_GET["id"];
if( hapus($id) > 0 ){
    header("Location: dashboard.php");
} else {
    echo "
            <script>
                alert('gagal hapus');
                document.location.href = 'dashboard.php';
            </script>
        ";
}

?>