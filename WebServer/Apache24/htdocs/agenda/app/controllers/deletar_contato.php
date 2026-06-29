<?php
session_name("agenda");
session_start();


if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    
    require_once("../models/Contact.php");
    
    $id_contato = intval($_GET['id']);
    $id_usuario = $_SESSION['usuario_id']; 

    $contactModel = new Contact();
    
   
    $contactModel->DeleteContato($id_contato, $id_usuario);
}

header("Location: ../views/contatos.php");
exit();
?>