<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
     include_once("Aluno.php");
     $obj = new Aluno();
     $exec = $obj->listarAlunos();

    if (!$exec) 
    {
        $exec = [];
    }
} 
else
{
    header("Location: cadastro_aluno.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Aluno</title>
</head>

<body>
    <Table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exec as $aluno): ?>
                <tr>
                    <td><?= $aluno["id_aluno"]; ?></td>
                    <td><?= $aluno["nome"]; ?></td>
                    <td><?= $aluno["email"]; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </Table>
    <a href="cadasro_aluno.php"><button>VOLTAR</button></a>
</body>

</html>