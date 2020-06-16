<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
    </head>

    <body>

        <form action="salvando.php" method="POST">
            <p>
                <h1>Cadastrar lanche</h1>
            </p>
            <p>Código do lanche:
                <input type="number" name="codigo" size="20" min="10" placeholder="código do lanche">
            </p>

            <p>Nome do lanche:
                <input type="text" name="nome" size="20" maxlength="64"  placeholder="descrição">
            </p>
            
            <p>Valor do lanche:
                <input type="number" name="preco" max="100" placeholder="valor do lanche">
            </p>

            <p>
                <input type="submit" name="cadastro" value="Cadastrar">
            </p>
        </form>
    </body>
</html>