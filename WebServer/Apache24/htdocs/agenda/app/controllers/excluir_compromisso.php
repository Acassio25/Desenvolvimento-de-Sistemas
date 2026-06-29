<?php
    session_name("agenda");
    session_start();
    if(!isset($_SESSION['usuario_id']))
    {
        header("Location: ../../index.php");
        exit();

    }
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $id_usuario = $_SESSION['usuario_id'];

    if($id > 0)
        {
            require_once("../models/Compromisso_mod.php");

            $appointmentModel = new Compromisso_Mod();

            $appointmentModel->DeleteCompromisso($id, $id_usuario);
        }

        header("Location: ../views/compromissos.php")
?>