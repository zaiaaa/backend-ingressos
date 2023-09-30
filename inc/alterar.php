<?php
include('./database.php');
    $id_evento = $_GET['id_evento'];
    $id_img = $_GET['id_img'];
    $id_img_real = explode(",", $id_img);

    $query = mysqli_query($conn, "SELECT * FROM concerto where id = $id_evento");
    $dados = mysqli_fetch_array($query);
    $dataFormatada = date('Y-m-d\TH:i', strtotime($dados['data_show']));

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Show</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/formCard.css">
</head>

<body>

    <main>
        <div class="form-card">
            <h1 align='center'>Alteração de evento</h1>
            <form action="./alteracao.php?id_evento=<?php echo $id_evento?>&id_img=<?php echo $id_img?>" method="post" enctype="multipart/form-data">
                <div class="parentForm">
                    <div class="part-um">
                        <label for="nome">Nome do evento</label><br>
                        <input class="form-control" type="text" name="nome" value="<?php echo $dados['nome'] ?>" required>
                        <br>
                        <label for="nome">Data do evento</label><br>
                        <input class="form-control" type="datetime-local" name="data" value="<?php echo $dataFormatada ?>" id="" required>
                        <br>

                        <label for="nome">Cantores</label><br>
                        <input class="form-control" type="text" name="cantores" value="<?php echo $dados['cantores'] ?>" required>
                        <br>

                        <label for="nome">Descrição do evento</label><br>
                        <textarea class="form-control" name="descricao" id="" cols="30" rows="3"><?php echo $dados['descricao'] ?></textarea>
                        <br>

                        <label for="nome">Valor do ingresso</label><br>
                        <input class="form-control" type="number" name="valor" id="" value="<?php echo $dados['valor'] ?>" required>
                        <br>
                    </div>
                    <div class="part-dois">
                        <label for="nome">Lote de ingressos</label><br>
                        <input class="form-control" type="number" name="lote" value="<?php echo $dados['lote'] ?>" required>
                        <br>

                        <label for="nome">Local do evento</label><br>
                        <input class="form-control" type="text" name="local" value="<?php echo $dados['local_concerto'] ?>" required>
                        <br>

                        <label for="nome">Limite de ingressos do evento</label><br>
                        <input class="form-control" type="number" name="limite_ingresso" value="<?php echo $dados['limite_ingresso'] ?>" required>
                        <br>
                    
                        <label for="nome">Imagens do evento</label><br>
                        <input class="form-control"type="file" name="imagens[]" id="imagens" multiple><br><br>
                        <div class="botoes">
                            <button type="submit" name="enviar" class="btn btn-success ">Enviar</button>
                            <button type="reset" class="btn btn-warning">Resetar</button>
                            <a href="../index.php"><button class="btn btn-primary" type="button">Voltar</button></a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </main>




    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/awesome/fontawesome.js"></script>
</body>

</html>