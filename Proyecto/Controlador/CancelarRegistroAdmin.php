<?php
    session_start();
    unset($_SESSION['AlumnoSesion']);
    $_SESSION["PermisoEdicion"]== false;
    
    echo '<script>window.location.href="PanelAdmin.php"</script>';

?>