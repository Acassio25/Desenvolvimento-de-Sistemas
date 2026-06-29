<?php
    session_name("agenda");
    session_start();
    if (!isset($_SESSION['usuario_id']))
    {
        header("Location: ../../index.php");
        exit();
    }

    require_once("../models/Contact.php");

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $nome = ''; $telefone = ''; $email = '';
    $editando = false;

    if ($id > 0) 
    {
        $contactModel = new Contact();
        $contato = $contactModel->ListarUmContato($id, $_SESSION['usuario_id']);
      if ($contato) 
        {
            $editando = true;
            $nome = $contato['nome'];
            $telefone = $contato['telefone'];
            $email = $contato['email'];
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $editando ? 'Editar Contato' : 'Novo Contato'; ?></title>
    <style>
        .box-form { max-width: 450px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); font-family: sans-serif; }
        .campo { margin-bottom: 15px; }
        .campo label { display: block; margin-bottom: 5px; font-weight: bold; }
        .campo input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    </style>
</head>
<body style="background:#f4f6f9;">
    <div class="box-form">
        <h2><?php echo $editando ? 'Editar Contato' : 'Novo Contato'; ?></h2>
        <form action="../controllers/novo_contato.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="campo">
                <label>Nome</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
            </div>
            <div class="campo">
                <label>Telefone</label>
                <input type="text" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required>
            </div>
            <div class="campo">
                <label>E-mail</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            
            <button type="submit" style="background:#2ecc71; color:white; border:none; padding:10px 15px; border-radius:4px; cursor:pointer;">Salvar</button>
            <a href="contatos.php" style="background:#95a5a6; color:white; padding:10px 15px; text-decoration:none; border-radius:4px; margin-left:10px;">Cancelar</a>
        </form>
    </div>
</body>
</html>