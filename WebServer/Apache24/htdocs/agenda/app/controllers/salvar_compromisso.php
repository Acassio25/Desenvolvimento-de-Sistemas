<?php
    session_name("agenda");
    session_start();

    if (!isset($_SESSION['usuario_id'])) 
    {
        header("Location: ../../index.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        require_once("../models/compromisso_mod.php");

        $id_usuario   = $_SESSION['usuario_id'];
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $titulo = trim($_POST['titulo']);
        $descricao = trim($_POST['descricao']);
        $data_compromisso = $_POST['data_compromisso'];
        $hora_compromisso = $_POST['hora_compromisso'];

        $appointmentModel = new Compromisso_Mod();

        if ($id > 0)
        {
            $appointmentModel->EditarCompromisso($id, $id_usuario, $titulo, $descricao, $data_compromisso, $hora_compromisso);
        } else {
        $appointmentModel->CadastrarCompromisso($id_usuario, $titulo, $descricao, $data_compromisso, $hora_compromisso);
        }

        header("Location: ../views/compromissos.php");
        exit();
    }
?>
