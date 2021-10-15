<?php
    class Pais 
    {
        private $codigo;
        private $nome;
        private $nacionalidade;
        private $continente;

        public function __construct($codigo, $nome = null, $nacionalidade = null, $continente = null)
        {
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->nacionalidade = $nacionalidade;
            $this->continente = $continente;
        }
    }