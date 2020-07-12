<div class="container-fluid conteudo">
    <div class="col-md-offset-2 col-md-8">
        <div class="row">
            <h4 class="titulo-tabela">Adicionar arquivos GeoJson</h4>
			<?php if ($alert) { ?>
                <div class="alert alert-<?php echo $alert["class"]; ?>">
					<?php echo $alert["mensagem"]; ?>
                </div>
			<?php } ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="captcha">
                <div class="form-group form-group-sm">
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="file_name" name="file_name" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                    </div>
                </div>
                <div class="form-group form-group-sm">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-sm btn-success pull-right" name="add" value="add"> Enviar Dados </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
