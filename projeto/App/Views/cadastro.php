<?php

use App\Models\Empresa;

$empresas = Empresa::all();

?>

<div class="hold-transition register-page">
    
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <a href="/" class="h1">Meu<b>ERP</b></a>
            </div>
            <div class="card-body">
            <p class="login-box-msg">Novo Cadastro</p>

            <form action="/novousuario" method="post">

                <div class=" mb-3">
                    <select name="empresa_id" class="form-control" style="width: 100%;" required>
                        <option value="">Selecione uma empresa...</option>
                        <?php foreach($empresas as $empresa): ?>
                            <option value="<?= $empresa->id ?>"><?= $empresa->nome ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" name="senha" class="form-control" placeholder="Senha">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" name="re_senha" class="form-control" placeholder="Digite novamente">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                        Concordo com os <a href="#">termos de uso</a>
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Criar Conta</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            </div>
            <div class="card-footer border-top">
            <a href="/login" class="text-center">Já tenho uma conta</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
<!-- /.register-box -->
</div>