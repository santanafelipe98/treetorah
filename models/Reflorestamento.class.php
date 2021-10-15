<?php
    class Reflorestamento
    {
        private $numero;
        private $ano;
        private $estado;
        private $valorSerPago;
        private $numeroArvoresCortadas;
        private $numeroArvoresRepostas;
        private $volume;
        private $situacao;
        private $dataInicio;
        private $dataConclusao;

        public function __construct($numero, $ano, $estado, $numeroArvoresCortadas, $volume)
        {
            $this->setNumero($numero);
            $this->setAno($ano);
            $this->setEstado($estado);
            $this->setNumeroArvoresCortadas($numeroArvoresCortadas);
            $this->setVolume($volume);
        }

        public function calcularValorSerPago()
        {
            $this->valorSerPago = $this->numeroArvoresCortadas * 0.75;
        }

        public function calcularNumeroArvoresRepostas()
        {
            $this->numeroArvoresRepostas = $this->volume * 6;
        }

        public function gerenciarSituaco($situacao)
        {
            $this->situacao = $situacao;
        }

        #Getters and Setters

        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($numero) 
        {
            $this->numero = $numero;
        }

        public function getAno() 
        {
            return $this->ano;
        }

        public function setAno($ano)
        {
            $this->ano = $ano;
        }

        public function getEstado() 
        {
            return $this->estado;
        }

        public function setEstado($estado)
        {
            $this->estado = $estado;
        }

        public function getValorSerPago() 
        {
            return $this->valorSerPago;
        }

        public function getNumeroArvoresCortadas()
        {
            return $this->numeroArvoresCortadas;
        }

        public function setNumeroArvoresCortadas($numeroArvoresCortadas)
        {
            $this->numeroArvoresCortadas = $numeroArvoresCortadas;
        }

        public function getNumeroArvoresRepostas() {
            return $this->numeroArvoresRepostas;
        }

        public function getVolume() 
        {
            return $this->volume;
        }

        public function setVolume($volume)
        {
            $this->volume = $volume;
        }

    }