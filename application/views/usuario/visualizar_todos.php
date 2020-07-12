    <div class="container-fluid conteudo">
      <div class="row">
          <div class="col-md-offset-1 col-md-10">
            <h4 class="titulo-tabela">Usuários cadastrados</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>PERFIL</th>
                    <th>DATA CRIAÇÃO</th>
                    <th>DATA ÚLTIMA ATUALIZAÇÃO</th>
                    <th>OPÇÕES</th>
                  </tr>
                <tbody>
                  <?php
                    if ($usuarios) {
                      foreach ($usuarios as $usuario) { ?>
                    <tr>
                      <td><?php echo $usuario["id"]; ?></td>
                      <td><?php echo $usuario["nome"]; ?></td>
                      <td><?php echo $usuario["email"]; ?></td>
                      <td><?php echo $usuario["perfil"]; ?></td>
                      <td><?php echo $usuario["created_at"]; ?></td>
                      <td><?php echo $usuario["updated_at"]; ?></td>
                      <td>
                        <a class="btn btn-default btn-sm" href="<?php echo base_url('usuario/editar/'.$usuario["id"]); ?>" ><i class="glyphicon glyphicon-pencil"></i></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('usuario/deletar/'.$usuario["id"]); ?>" onclick="return confirm('Deseja realmente remover este usuário?');"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                  <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="5" class="text-center">Não há usuários cadastrados.</td>
                      </tr>
                      <?php
                    }
                    ?>
                </tbody>
                </thead>
              </table>
            </div>
          </div>
      </div>
    </div>
