<?php
    session_start();
    unset($_SESSION['AlumnoSesion']);
    $_SESSION["PermisoEdicion"]== false;
    session_destroy();
    echo '<script>window.location.href="../Vista/Paginas/index.html"</script>';

?>