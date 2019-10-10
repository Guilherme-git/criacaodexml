<?php

    class Produto{
        private $nome;
        private $tipo;
        private $fornecedor;
        private $quantidade;

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function getFornecedor(){
            return $this->fornecedor;
        }

        public function setFornecedor($fornecedor){
            $this->fornecedor = $fornecedor;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

       
    }
?>