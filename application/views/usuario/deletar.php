    <div class="container-fluid conteudo">
      <div class="col-md-offset-2 col-md-8">
          <div class="row">
            <h4 class="titulo-tabela">Deletar usuário</h4>
            <?php if ($alerta) { ?>
              <div class="alert alert-<?php echo $alerta["class"]; ?>">
                <?php echo $alerta["mensagem"]; ?>
              </div>
              <?php } ?>
              <a href="<?php echo base_url('usuario/visualizar_todos'); ?>" type="submit" class="btn btn-sm btn-default pull-left"> Voltar </a>
          </div>
      </div>
    </div>
