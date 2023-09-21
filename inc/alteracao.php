<?php
    include('./database.php');
    $id_evento = $_GET['id_evento'];
    //$id_img = $_GET['id_img'];
    //$id_img_real = explode(",", $id_img);

    $nome = $_POST['nome'];
    $date = $_POST['data'];
    $data_formatada = date('Y-m-d H:i:s', strtotime($date));
    $cantores = $_POST['cantores'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $lote = $_POST['lote'];
    $local = $_POST['local'];
    $limite_ingresso = $_POST['limite_ingresso'];
    //$arquivos = $_FILES['imagens'];

    $queryEvento = mysqli_query($conn, "UPDATE concerto 
    SET nome = '$nome',
    data_show = '$data_formatada',
     cantores = '$cantores',
      descricao = '$descricao',
       valor = '$valor',
        lote = '$lote',
         local_concerto = '$local',
          limite_ingresso = $limite_ingresso WHERE id = $id_evento");

    // for ($i=0; $i < count($id_img_real) ; $i++) { 
    //     foreach ($arquivos['name'] as $key => $nome) {
    //         $tmp_name = $arquivos['tmp_name'][$key];
    //         $error = $arquivos['error'][$key];
    //         $extensao = pathinfo($nome, PATHINFO_EXTENSION);
    //         $novoNome = uniqid();
    
    //         if ($error === UPLOAD_ERR_OK) {
    //             // Processar e mover o arquivo temporário $tmp_name para o destino desejado
    //             $destinoBanco = 'arquivos/' . $novoNome . '.' .$extensao;
    //             $destinoPasta = '../arquivos/' . $novoNome . '.' .$extensao;
    //             move_uploaded_file($tmp_name, $destinoPasta);
    
    //             $query = mysqli_query($conn, "UPDATE imagens set caminho = $destino_banco WHERE id = $id_img_real[$i]");
    //             echo "Arquivo $nome enviado com sucesso!<br>";
    //         } else {
    //             echo "Erro ao enviar o arquivo $nome. Código de erro: $error<br>";
    //         }
    //     }        
    // }
    if($queryEvento){
        echo 'Alterado com sucesso! <br> <a href="../index.php">Voltar ao index</a>';
    }else{
        echo 'deu erro';
    }

?>