<div class="hold-transition login-page">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1">Meu<b>ERP</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Faça login para continuar</p>

        <form action="/iniciarsessao" method="post">
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
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Lembrar-me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->

      <div class="card-footer border-top text-start">
        <p class="mb-1">
          <a href="forgot-password.html">Esqueci minha senha</a>
        </p>
        <p class="mb-0">
          <a href="/cadastro" class="text-center">Novo por aqui? Cadastre-se</a>
        </p>
      </div>

    </div>
    <!-- /.card -->
  </div>

</div>