<?php
    include_once './ligacao.php';
?>

<html>
    <head>
        <title>Cadastre-se</title>
    </head>

    <body>
        <h1>Cadastrar</h1>
        <?php
            $infologin = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if(!empty($infologin['botaocadastro'])) {
                var_dump($infologin);
                
                $queryusuario = "INSERT INTO usuarios (nome, nomecompleto, email) VALUES (:nome, :nomecompleto, :email)";
                $cadastrousuario = $ligacao->prepare($queryusuario);

                $cadastrousuario->bindParam(':nome', $infologin['nome']);
                $cadastrousuario->bindParam(':nomecompleto', $infologin['nomecompleto']);
                $cadastrousuario->bindParam(':email', $infologin['email']);

                $cadastrousuario->execute();
                
                if($cadastrousuario->rowCount()) {
                    echo("Cadastro efetuado!");
                } else {
                    echo("Tente cadastrar novamente!");
                }
            }
        ?>

        <div class="box">
            <form name="cadastro" method="post" action="cadastro.php">
                <div class="field">
                    <div class="control">
                        <input id="nome" type="text" name="nome" placeholder="Nome de usuário">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input id="nomecompleto" type="text" name="nomecompleto" placeholder="Nome completo">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input id="telefone" type="number" name="telefone" placeholder="Telefone">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input id="email" type="text" name="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input id="senha" type="password" name="senha" placeholder="Senha">
                    </div>
                </div>
                <button type="submit" id=botaoCadastro name="botaoCadastro">Cadastrar</button>
            </form>
        </div>
    </body>
</html>