<?php
class Contact
{
    private object $pdo;

    public function __construct()
    {
        
        include_once("Connect.php");
        $conexao = new Connect();
        $this->pdo = $conexao->conectarBanco(); 
    }

    public function ListarContatos($id_usuario, $busca = '')
    {
        if (!empty($busca)) {
            $sql = "SELECT * FROM contatos WHERE id_usuario = :id_usuario AND (nome LIKE :busca OR email LIKE :busca) ORDER BY nome ASC;";
            $stmt = $this->pdo->prepare($sql);
            $buscaParam = "%" . $busca . "%";
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':busca', $buscaParam);
        } else {
            $sql = "SELECT * FROM contatos WHERE id_usuario = :id_usuario ORDER BY nome ASC;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ListarUmContato($id, $id_usuario)
    {
        $sql = "SELECT * FROM contatos WHERE id = :id AND id_usuario = :id_usuario;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function CadastrarContato($id_usuario, $nome, $telefone, $email)
    {
        $sql = "INSERT INTO contatos (id_usuario, nome, telefone, email) VALUES (:id_usuario, :nome, :telefone, :email);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    public function EditarContato($id, $id_usuario, $nome, $telefone, $email)
    {
        $sql = "UPDATE contatos SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id AND id_usuario = :id_usuario;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    public function DeleteContato($id, $id_usuario)
    {
        $sql = "DELETE FROM contatos WHERE id = :id AND id_usuario = :id_usuario;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return $stmt->execute();
    }
}
?>