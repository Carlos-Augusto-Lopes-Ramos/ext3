<?php

include_once "DAO/LivroDAO.php";
include_once "Model/LivroModel.php";

class LivroController{

    private $dao;
    private $livro;
    public function index(){
        $this->dao = new LivroDAO();
        $this->livro = new LivroModel();
    }

    public function listarTodos()
    {
        return $this->dao->listar();
    }

    public function incluir()
    {

    }

    public function alterar($id, $isbn, $titulo, $ap, $pv, $id_editora)
    {
        $this->dao->atualizar($id, $isbn, $titulo, $ap, $pv, $id_editora);
    }

    public function visualizar()
    {

    }

    public function excluir($id)
    {
        $this->dao->deletar($id);
    }

    public function pesquisar()
    {

    }

}





?>