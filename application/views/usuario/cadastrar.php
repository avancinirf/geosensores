    <div class="container-fluid conteudo">
      <div class="col-md-offset-2 col-md-8">
          <div class="row">
            <h4 class="titulo-tabela">Cadastrar usuário</h4>
            <?php if ($alerta) { ?>
              <div class="alert alert-<?php echo $alerta["class"]; ?>">
                <?php echo $alerta["mensagem"]; ?>
              </div>
            <?php } ?>
              <form class="form-horizontal" action="<?php echo base_url('usuario/cadastrar'); ?>" method="post">
                <input type="hidden" name="captcha">
                <div class="form-group form-group-sm">
                  <label class="col-sm-2 control-label" for="nome">Nome</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="nome" name="nome" value="<?php echo set_value('nome') ? set_value('nome') : ""; ?>" required>
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <label class="col-sm-2 control-label" for="email">E-mail</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo set_value('email') ? set_value('email') : ""; ?>" required>
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <label class="col-sm-2 control-label" for="senha">Senha</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="password" id="senha" name="senha" value="" required>
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <label class="col-sm-2 control-label" for="confirmar_senha">Confirmar senha</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="password" id="confirmar_senha" name="confirmar_senha" value="" required>
                  </div>
                </div>
                <div class="form-group form-group-sm">
                  <div class="col-sm-offset-2 col-sm-10">
                    <a href="<?php echo base_url('usuario/visualizar_todos'); ?>" type="submit" class="btn btn-sm btn-default pull-left"> Voltar </a>
                    <button type="submit" class="btn btn-sm btn-success pull-right" name="cadastrar" value="cadastrar"> Cadastrar </button>
                  </div>
                </div>
              </form>
          </div>
      </div>
    </div>
