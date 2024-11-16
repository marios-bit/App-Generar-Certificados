<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('location:../index.php');
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="index.php" aria-current="page"
                    >Inicio <span class="visually-hidden">(current)</span></a
                >
                <a class="nav-item nav-link" href="vista_alumnos.php">Alumnos</a>
                <a class="nav-item nav-link" href="vista_cursos.php">Cursos</a>
                <a class="nav-item nav-link" href="cerrar.php">Cerrar Sesión</a>
                <div style="display: flex; justify-content: flex-end;">
                    <a class="nav-item nav-link text-dark" href="db_admin.php">
                        <img src="https://cdn0.iconfinder.com/data/icons/database-75/48/14-512.png" style="width: 40px; height: 40px;"/>
                    </a>
                </div>
                                
                
            </div></nav>
        
