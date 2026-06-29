<?php
session_name("agenda");
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("../models/Contact.php");

    $id_usuario = $_SESSION['usuario_id'];
    

    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $email = trim($_POST['email']);

    $contactModel = new Contact();

        if ($id > 0) {
        
        $contactModel->EditarContato($id, $id_usuario, $nome, $telefone, $email);
    } else {
        
        $contactModel->CadastrarContato($id_usuario, $nome, $telefone, $email);
    }

    
    header("Location: ../views/contatos.php");
    exit();
}
?>