<?php
    require_once('iDAO.class.php');
    require_once('FabricaConexao.class.php');
    require_once('Estado.class.php');
    require_once('Pais.class.php');

    class EstadoDAO implements DAO
    {
        private const TABELA = 'estados';

        public function find($id)
        {
            $stmt = 'SELECT * FROM ' . self::TABELA . ' WHERE cd_estado = :codigo';
            $consulta = FabricaConexao::prepare($stmt);
            $consulta->bindParam(':codigo', $id);
            $consulta->execute();

            $resultado = $consulta->fetch();

            if (!empty($resultado)) {
                $codigo = $id;
                $nome = $resultado['nome_estado'];
                $sigla = $resultado['sigla_estado'];
                $regiao = $resultado['regiao'];

                $estado = new Estado($codigo, $nome, $sigla, $regiao);

                return $estado;
            }

            return null;
        }

        public function findAll()
        {
            $stmt = 'SELECT * FROM ' . self::TABELA . ' ORDER BY nome_estado';
            $consulta = FabricaConexao::prepare($stmt);
            $consulta->execute();

            $resultado = $consulta->fetchAll();
            $estados = [];

            foreach ($resultado as $row)
            {
                $codigo = $row['cd_estado'];
                $codigo_pais = $row['cd_pais'];
                $nome = $row['nome_estado'];
                $sigla = $row['sigla_estado'];
                $regiao = $row['regiao'];

                $estado = new Estado($codigo, $nome, $sigla, $regiao, new Pais($codigo));
                $estados[] = $estado;
            }

            return $estados;
        }

        public function update($m)
        {

        }

        public function delete($m) 
        {

        }
    }