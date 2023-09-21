<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar eventos</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/tabela_view.css">
</head>
<body>
    

    <?php 
    include('inc/database.php');
    $query = mysqli_query($conn, "SELECT * FROM concerto");
    // $dadosEvento = mysqli_fetch_array($query);
    // var_dump($dadosImagem);
    $id_imagens;
    ?>
    <main class="main"> 
        <h2 align="center">Visualização de eventos</h2>
        <hr>
        <a href="inc/incluir.php"><button class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Adicionar Evento</button></a>
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagens</th>
                    <th scope="col">Nome do evento</th>
                    <th scope="col">Data do evento</th>
                    <th scope="col">Cantores</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Lote atual</th>
                    <th scope="col">Local</th>
                    <th scope="col">Limite de ingressos</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            
            <?php   
                while($dadosEvento=mysqli_fetch_array($query)){ 
                    $id_evento = $dadosEvento['id'];
                    $queryImg = mysqli_query($conn, "SELECT * FROM imagens where id_concerto = $id_evento");
                    $data_formatada = date("d/m/Y H:i:s", strtotime($dadosEvento['data_show']));
                    $id_imagens = [];
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $dadosEvento['id']?></th>
                    <td>
                    <?php while($dadosImg = mysqli_fetch_array($queryImg)){
                        echo '<img width="100px" class="mb-2 mr-2" margin-right="15px" src="'. $dadosImg['caminho'].'">';
                        $id_imagens[] = $dadosImg['id'];
                    }?></td>
                    <td><?php echo $dadosEvento['nome'] ?></td>
                    <td><?php echo $data_formatada?></td>
                    <td><?php echo $dadosEvento['cantores']?></td>
                    <td><?php echo $dadosEvento['descricao']?></td>
                    <td><?php echo $dadosEvento['valor']?></td>
                    <td><?php echo $dadosEvento['lote']?></td>
                    <td><?php echo $dadosEvento['local_concerto']?></td>
                    <td><?php echo $dadosEvento['limite_ingresso']?></td>
                    <td>
                    <a href="inc/exclusao.php?id_evento=<?php echo $dadosEvento['id']?>&id_img=<?php echo implode(", ", $id_imagens);?>"><button type="button" class="btn btn-danger mb-2">Excluir</button></a>
                        <br>
                        <a href="inc/alterar.php?id_evento=<?php echo $dadosEvento['id']?>&id_img=<?php echo implode(", ", $id_imagens);?>"><button class="btn btn-warning" type="button">Alterar</button></a>
                    </td>
                </tr>
            </tbody>
            <?php }?>
        </table>
    </main>




    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/awesome/all.min.js"></script>
    <script src="js/awesome/fontawesome.min.js"></script>
</body>
</html>
