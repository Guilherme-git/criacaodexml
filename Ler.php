<?php
    if(!file_exists('produto.xml')){
        $a = 0;
    }else{
        $xml = simplexml_load_file('produto.xml');
        $a = 1;
    }   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Manipulação XML</title>
</head>
<body>
    <div class="Result">
        <?php
            if($a == 0){
                echo "<h3>Não contém dados</h3>";
            }else if($a == 1){
        ?>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($xml->Produto as $value) {
                    $nome = $value->Nome;
                    $tipo = $value->Tipo;
                    $fornecedor = $value->Fornecedor;
                    $quantidade = $value->Quantidade;
            ?>
            <tr>
                <td><?php echo $nome; ?></td>
                <td><?php echo $tipo; ?></td>
                <td><?php echo $fornecedor; ?></td>
                <td><?php echo $quantidade; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>   
</body>
</html>