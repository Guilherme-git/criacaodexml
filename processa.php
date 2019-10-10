<?php
    require_once 'class/produto.class.php';

    $classProduto = new Produto();


    $classProduto->setNome($_POST['nome']);
    $classProduto->setTipo( $_POST['tipo']);
    $classProduto->setFornecedor($_POST['fornecedor']);
    $classProduto->setQuantidade($_POST['quantidade']);

    if(!file_exists('produto.xml')){
        //Cria objeto passando como valor a versão do XML
        $dom = new DOMDocument('1.0','UTF-8');

        //Nesse ponto, informamos para o objeto que não queremos espaços em branco no documento
        $dom->preserveWhiteSpaces = false;

        //Aqui, dizemos para o objeto que queremos gerar uma saída formatada
        $dom->formatOutput = true;
        
        //Criando as TAG XML
        $produtos = $dom->createElement('Produtos');//Elemento PAI
        $produto = $dom->createElement('Produto');//Elemento FILHO
        $nome = $dom->createElement('Nome');//Elemento NETO
        $tipo = $dom->createElement('Tipo');//Elemento NETO
        $fornecedor = $dom->createElement('Fornecedor');//Elemento NETO
        $quantidade = $dom->createElement('Quantidade');//Elemento NETO
        
        //Adicionar Valores as TAG XML
        $nomeTXT = $dom->createTextNode($classProduto->getNome());
        $tipoTXT = $dom->createTextNode($classProduto->getTipo());
        $fornecedorTXT = $dom->createTextNode($classProduto->getFornecedor());
        $quantidadeTXT = $dom->createTextNode($classProduto->getQuantidade());

        $nome->appendChild($nomeTXT);
        $tipo->appendChild($tipoTXT);
        $fornecedor->appendChild($fornecedorTXT);
        $quantidade->appendChild($quantidadeTXT);

        $produto->appendChild($nome);
        $produto->appendChild($tipo);
        $produto->appendChild($fornecedor);
        $produto->appendChild($quantidade);
        $produtos->appendChild($produto);
        $dom->appendChild($produtos);

        $dom->saveXML();
        $dom->save('produto.xml');
        header('Location: index.html');

    }else{
        $xml = simplexml_load_file('produto.xml');

        $produto = $xml->addChild('Produto');
        $produto->addChild('Nome',$classProduto->getNome());
        $produto->addChild('Tipo',$classProduto->getTipo());
        $produto->addChild('Fornecedor',$classProduto->getFornecedor());
        $produto->addChild('Quantidade',$classProduto->getQuantidade());


        file_put_contents('produto.xml',$xml->asXML());
        header('Location: index.html');
    }
?>
