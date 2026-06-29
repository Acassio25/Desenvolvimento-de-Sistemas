<?php
session_name("agenda");
session_start();

    require_once("../models/Connect.php");
    $conexao = new Connect();
    $pdo = $conexao->conectarBanco();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['usuario_id'])) 
    {
        $usuario_id = $_SESSION['usuario_id'];

   
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK)
        {
            $arq_tmp   = $_FILES['imagem']['tmp_name'];
            $arq_nome  = $_FILES['imagem']['name'];

            $extensao = strtolower(pathinfo($arq_nome, PATHINFO_EXTENSION));
            $extensoes_validas = ['jpg', 'jpeg', 'png'];

            if (in_array($extensao, $extensoes_validas)) 
            {
            
            $novo_nome = "perfil_" . $usuario_id . "_" . uniqid() . "." . $extensao;
            $pasta_destino = "../../public/img/uploads/" . $novo_nome;

            
            if (move_uploaded_file($arq_tmp, $pasta_destino)) 
            {
               
                $link_da_foto = "../../public/img/uploads/" . $novo_nome;
                
                try {
                    $sql = "UPDATE usuarios SET foto_link = :foto WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':foto' => $link_da_foto,':id'=> $usuario_id]);
                } catch (Exception $e) {
                    
                    // die("Erro no banco: " . $e->getMessage());
                }
                

                
                $_SESSION['usuario_foto'] = $link_da_foto;

                
                header("Location: ../views/perfil.php?sucesso=1");
                exit();
            }
        }
    }
    
    // Se o código chegou até aqui, alguma validação do upload falhou
    header("Location: ../views/perfil.php?erro=1");
    exit();
}

// Proteção: se tentarem acessar este arquivo diretamente via URL, joga de volta para o perfil
header("Location: ../views/perfil.php");
exit();