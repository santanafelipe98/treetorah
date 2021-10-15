<?php
    class Estado 
    {
        private $codigo;
        private $nome;
        private $sigla;
        private $regiao;
        private $pais;

        public function __construct($codigo, $nome = null, $sigla = null, $regiao = null, $pais = null)
        {
            $this->setCodigo($codigo);
            $this->setNome($nome);
            $this->setSigla($sigla);
            $this->setRegiao($regiao);
            $this->setPais($pais);
        }

        #Getters and Setters

        public function getCodigo()
        {
            return $this->codigo;
        }

        public function setCodigo($codigo)
        {
            $this->codigo = $codigo;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getSigla() 
        {
            return $this->sigla;
        }

        public function setSigla($sigla) 
        {
            $this->sigla = $sigla;
        }

        public function getRegiao() 
        {
            return $this->regiao;
        }

        public function setRegiao($regiao) 
        {
            $this->regiao = $regiao;
        }

        public function getPais() 
        {
            return $this->pais;
        }

        public function setPais($pais)
        {
            $this->pais = $pais;
        }
    }