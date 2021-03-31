<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once("ContaBanco.php");
            
            $c1 = new ContaBanco();
            $c1->abrirConta("cc");
            $c1->setNome("Levi Alves Junior");
            $c1->setNumConta("01010101");
            
            $c1->fecharConta();
            $c1->depositar(1000);
            $c1->pagarMensal();
            $c1->fecharConta();
            $c1->abrirConta('cc');
            $c1->sacar(1200);
            $c1->sacar(1030);
            $c1->fecharConta();
            $c1->fecharConta();
            $c1->sacar(1030);
            $c1->mostrarStatus();
        ?>
    </body>
</html>
