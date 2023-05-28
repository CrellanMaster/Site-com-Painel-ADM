<?php


$verify = getUrlParams($_SERVER['REQUEST_URI']);
$this->layout("_theme", ["Title" => $Title]); ?>


<div class="container-form">
    <h1 class="text-center my-1 py-3 light">Entrar</h1>

    <div id="loginStatus">
    </div>

    <form id="loginForm" class="form-login" method="post" action="<?= url("loginAct"); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">
                <i class="fas fa-envelope"></i>
            </label>
            <input name="user" type="email" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   placeholder="Email">


            <!--                <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com-->
            <!--                    ninguém.</small>-->
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"><i class="fa-solid fa-lock"></i></label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                   placeholder="Senha">
        </div>
        <!--            <div class="form-group form-check">-->
        <!--                <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
        <!--                <label class="form-check-label" for="exampleCheck1">Clique em mim</label>-->
        <!--            </div>-->
        <button type="submit" class="btn btn-primary w-50 btn-login ">Login</button>
    </form>
    <?php
    if (isset($Success) && $Success === true) : ?>
        <h3 class="alert alert-success">Produto cadastrado com sucesso</h3>
    <?php
    endif; ?>
</div>


<?php
$this->start("scripts");; ?>

<script src="/public/assets/js/login.js"></script>
<?php
$this->end("scripts"); ?>

