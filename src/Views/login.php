<?php

$verify = getUrlParams($_SERVER['REQUEST_URI']);

$this->layout("_theme", ["Title" => $Title]); ?>

    <h1 class="text-center my-5 py-3 light">Entrar</h1>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto">

                <?php
                if (isset($verify['login_failed']) && $verify['login_failed'] === '1') : ?>
                    <div class="alert alert-danger" role="alert">
                        Falha ao conectar! Usuário e/ou senha estão incorretos.
                    </div>
                <?php
                elseif (isset($verify['login_failed']) && $verify['login_failed'] == 2) : ?>
                    <div class="alert alert-danger" role="alert">
                        Preencha os dados corretamente!
                    </div>
                <?php
                endif; ?>

                <form class="form-login" method="post" action="<?= url("loginAct"); ?>"
                <h1>Cadastrar</h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de email</label>
                    <input name="user" type="email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp"
                           placeholder="Seu email">
                    <!--                <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com-->
                    <!--                    ninguém.</small>-->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Senha">
                </div>
                <!--            <div class="form-group form-check">-->
                <!--                <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
                <!--                <label class="form-check-label" for="exampleCheck1">Clique em mim</label>-->
                <!--            </div>-->
                <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <?php
                if (isset($Success) && $Success === true) : ?>
                    <h3 class="alert alert-success text-center">Produto cadastrado com sucesso</h3>
                <?php
                endif; ?>
            </div>
        </div>
    </div>


<?php
$this->start("scripts");


$this->end("scripts");

