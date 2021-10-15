<?php
    require_once('models/EstadoDAO.class.php');
    header('Content-Type: text/html; charset=utf-8');

    define('MAX_ANOS', 20);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>TreeTorah - Calculadora de Reflorestamento</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <main id="content">
            <div class="container-fluid">

                <form name="calcReflorestamento" method="POST" action="ResultadoCalculadora.php">

                    <div class="form-row">

                        <div class="form-group col-xs-4 col-sm-3 col-md-3">
                            <label for="ano">Ano</label>
                            <select name="ano" id="selAno" class="form-control control-lg-3">
                                <?php 
                                    $anoAtual = date('Y');
                                    for($a = $anoAtual; $a >= $anoAtual - MAX_ANOS; $a--) { ?>
                                        <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-xs-4 col-sm-3 col-md-3">
                            <label for="estado">Estado</label>
                            <select name="estado" id="selEstado" class="form-control">
                                <?php
                                    $estadoDAO = new EstadoDAO();
                                    $estados = $estadoDAO->findAll();

                                    foreach ($estados as $estado)
                                    {
                                ?>
                                        <option value="<?php echo $estado->getCodigo(); ?>"><?php echo $estado->getNome(); ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    
                    </div>

                    <div class="form-row">

                        <div class="form-group col-xs-4 col-sm-3 col-md-3">
                            <label for="numeroArvoresCortadas">Número de árvores cortadas</label>
                            <input type="number" name="numeroArvoresCortadas" id="numeroArvoresCortadas" class="form-control" value="1" min="1">
                        </div>

                        <div class="form-group col-xs-4 col-sm-3 col-md-3">
                            <label for="volumeEmMetrosCubicos">Volume (m³)</label>
                            <input type="number" name="volume" id="volumeEmMetrosCubicos" class="form-control" value="1" min="1">
                        </div>                    
                    
                    </div>

                    <button type="submit" name="calcular" class="btn btn-primary">Calcular</button>
                
                </form>

            </div>
        </main>
    </body>
</html>