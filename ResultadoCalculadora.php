<?php
    require_once('models/Reflorestamento.class.php');
    require_once('models/Estado.class.php');
    require_once('models/EstadoDAO.class.php');

    header('Content-Type: text/html; charset=utf-8');

    $reflorestamento = null;

    if (isset($_POST['calcular'])) {
        $ano = $_POST['ano'];
        $codigoEstado = $_POST['estado'];
        $numeroArvoresCortadas = trim(strip_tags($_POST['numeroArvoresCortadas']));
        $volumeEmMetrosCubicos = trim(strip_tags($_POST['volume']));

        $estadoDAO = new EstadoDAO();
        $estado = $estadoDAO->find($codigoEstado);

        $reflorestamento = new Reflorestamento(1, $ano, $estado, $numeroArvoresCortadas, $volumeEmMetrosCubicos);
        $reflorestamento->calcularValorSerPago();
        $reflorestamento->calcularNumeroArvoresRepostas();
    }
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TreeTorah - Resultado da Calculadora</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div id="content">
            <section id="resumo">
                <div class="container-fluid">
                    <h1 class="page-header">Resumo</h1>

                    <div class="table-responsive">
                        <?php
                            if (!empty($reflorestamento))
                            {
                        ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>Ano</td>
                                            <td>Estado</td>
                                            <td>Número de árvores cortadas</td>
                                            <td>Volume (m³)</td>
                                            <td>Árvores a repor</td>
                                            <td>Valor a ser pago</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $reflorestamento->getAno(); ?></td>
                                            <td><?php echo $reflorestamento->getEstado()->getNome(); ?></td>
                                            <td><?php echo $reflorestamento->getNumeroArvoresCortadas(); ?></td>
                                            <td><?php echo $reflorestamento->getVolume(); ?></td>
                                            <td><?php echo $reflorestamento->getNumeroArvoresRepostas(); ?></td>
                                            <td><?php echo $reflorestamento->getValorSerPago(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
            
            <a class="back-control" href="CalculadoraReflorestamento.php">Voltar</a>
        </div>
    </body>
</html>