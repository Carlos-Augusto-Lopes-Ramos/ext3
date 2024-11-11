<?php

class LivroModel {

    private $idLivro;
    private $isbn;
    private $titulo;
    private $anoPublicacao;
    private $editora;

    public function __construct($idLivro="", $isbn="", $titulo="", $anoPublicacao="", $editora ="") {
        $this->idLivro = $idLivro;
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anoPublicacao = $anoPublicacao;
        $this->editora = $editora;
    }

    public function getIdLivro(){
        return $this->idLivro;
    }
    public function setIdLivro($idLivro){
        $this->idLivro = $idLivro;
    }

    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAnoPublicacao(){
        return $this->anoPublicacao;
    }
    public function setAnoPublicacao($anoPublicacao){
        $this->anoPublicacao = $anoPublicacao;
    }

    public function getEditora(){
        return $this->editora;
    }
    public function setEditora($editora){
        $this->editora = $editora;
        if ($editora !== null && !empty($editora))
            $editora->addLivros($this);
    }




}




?>