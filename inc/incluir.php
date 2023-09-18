<?php
include('./database.php');


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
            <h2>Cadastro de evento</h2>
            <form action="./inclusao.php" method="post" enctype="multipart/form-data">
                <div class="parentForm">
                    <div class="part-um">
                        <label for="nome">Nome do evento</label><br>
                        <input class="form-control" type="text" name="nome" placeholder="Evento tal.." required>
                        <br>

                        <label for="nome">Data do evento</label><br>
                        <input class="form-control" type="datetime-local" name="data" id="" required>
                        <br>

                        <label for="nome">Cantores</label><br>
                        <input class="form-control" type="text" name="cantores" placeholder="Cantor1, Cantor 2" required>
                        <br>

                        <label for="nome">Descrição do evento</label><br>
                        <textarea class="form-control" name="descricao" id="" cols="30" rows="3" placeholder="Descrição breve sobre o evento e participações"></textarea>
                        <br>

                        <label for="nome">Valor do ingresso</label><br>
                        <input class="form-control" type="number" name="valor" id="" placeholder="60" required>
                        <br>
                    </div>
                    <div class="part-dois">
                        <label for="nome">Lote de ingressos</label><br>
                        <input class="form-control" type="number" name="lote" placeholder="Lote do evento (ex. 1)" required>
                        <br>

                        <label for="nome">Local do evento</label><br>
                        <input class="form-control" type="text" name="local" placeholder="Rua domingues, 55" required>
                        <br>

                        <label for="nome">Limite de ingressos do evento</label><br>
                        <input class="form-control" type="number" name="limite_ingresso" placeholder="limite de venda de ingressos (ex. 4000)" required>
                        <br>
                    
                        <label for="nome">Imagens do evento</label><br>
                        <input class="form-control"type="file" name="imagens[]" id="imagens" multiple required><br><br>
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