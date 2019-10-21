    <div class="container conteudo">
      <div class="row">
        <div class="col-md-offset-4 col-md-4 bloco-login">
            <h3 class="text-center titulo-login">Login</h3>
          <?php if ($alerta != NULL) { ?>
            <div class="alert alert-<?php echo $alerta["class"]; ?>">
              <?php echo $alerta["mensagem"]; ?>
            </div>
          <?php } ?>

          <form action="<?php echo base_url('conta/entrar'); ?>" method="post">
            <input type="hidden" name="captcha">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control input-sm" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
            </div>
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" name="senha" class="form-control input-sm" id="senha" placeholder="Senha" required>
            </div>
            <button type="submit" name="entrar" value="entrar" class="btn btn-success btn-sm btn-login center-block"> Entrar </button>
          </form>
          <form action="<?php echo base_url('conta/visitante'); ?>" method="post">
            <input type="hidden" name="captcha">
            <input type="hidden" name="nome" value="Visitante">
            <button type="submit" name="visitante" value="visitante" class="btn btn-primary btn-sm btn-login-visitante center-block"> Entrar como Visitante</button>
          </form>
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>
