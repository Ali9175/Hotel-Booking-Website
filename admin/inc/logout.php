<?php 

    require('inc/essentiales.php');

    session_start();
    session_destroy();
    redirect('index.php');

?>