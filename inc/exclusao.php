<?php
    include('./database.php');
    $id_evento = $_GET['id_evento'];
    $id_img = $_GET['id_img'];
    $id_img_real = explode(",", $id_img);
    function imprimirItem($item){
        echo $item. ' ';
    }

    $queryEvento = mysqli_query($conn, "DELETE FROM concerto WHERE id = $id_evento");

    for ($i=0; $i < count($id_img_real) ; $i++) { 
        $query = mysqli_query($conn, "DELETE FROM imagens WHERE id = $id_img_real[$i]");
    }
    if($query && $queryEvento){
        echo 'Excluido com sucesso!';
    }else{
        echo 'deu erro';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>