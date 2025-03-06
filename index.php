<!DOCTYPE html>

<html lang="pt-BR" style="background-color: graytext">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
        
        require 'ContaBanco.php';                
        
        // Jubileu - deposito de 300
        $pessoa1 = new ContaBanco();
        $pessoa1->setnumConta("1111");
        $pessoa1->abrirConta("CC");
        $pessoa1->setdono("Jubileu");
        $pessoa1->depositar(300);
        $pessoa1->pagarMensal();
        $pessoa1->sacar(300);
        print_r($pessoa1);
        
        // Creuza - deposito de 500
        $pessoa2 = new ContaBanco();
        $pessoa2->setnumConta("2222");
        $pessoa2->abrirConta("CP");
        $pessoa2->setdono("Creuza");
        $pessoa2->depositar(500);
        $pessoa2->pagarMensal();
        $pessoa2->sacar(600);
        $pessoa2->fecharConta();
        print_r($pessoa2);
        ?>
        </pre>
    </body>
</html>
