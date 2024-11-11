<?php
require_once 'Conexao.php';

class LivroDAO{
    private $con;
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function carregarLivro($id)
    {
        $sth = $this->con->prepare("SELECT * FROM livro WHERE id_livro = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch();
    }

    public function listar()
    {
        $sth = $this->con->prepare("SELECT * FROM livro");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function inserir($obj)
    {
        
          
    }

    public function retornar($id)
    {
   
    }

    public function atualizar($id, $isbn, $titulo, $ap, $pv, $id_editora) 
    {
        $sth = $this->con->prepare("UPDATE livro
            SET isbn = :isbn , titulo = :titulo , ano_publicacao = :ap , preco_venda = :pv , id_editora = :id_editora
            WHERE id_livro = :id;");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':isbn', $isbn, PDO::PARAM_STR);
        $sth->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $sth->bindValue(':ap', $ap, PDO::PARAM_INT);
        $sth->bindValue(':pv', $pv, PDO::PARAM_INT);
        $sth->bindValue(':id_editora', $id_editora, PDO::PARAM_INT);
        $sth->execute();
    }

    public function deletar($id)
    {
        $firststh = $this->con->prepare("DELETE FROM livro_autor WHERE id_livro = :id");
        $firststh->bindValue(':id', $id, PDO::PARAM_INT);
        $firststh->execute();
        $sth = $this->con->prepare("DELETE FROM livro WHERE id_livro = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }

    public function buscar($parametro)
    {
     
    }

}



?>