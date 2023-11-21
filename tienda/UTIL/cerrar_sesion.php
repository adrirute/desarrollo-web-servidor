<?php
    session_start();
    session_destroy();
    header('location: ../VIEWS/inicio_sesion.php');
?>