<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('home'); ?>">Projeto - GeoSensores</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class=""><a href="<?php echo base_url('quemsomos'); ?>">Quem Somos</a></li>
        <li class=""><a href="<?php echo base_url('analysis'); ?>">Análises</a></li>
        <li class=""><a href="<?php echo base_url('data'); ?>">Dados</a></li>
        <?php 
          if ($this->session->userdata('perfil') === "admin") {
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuários <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li class=""><a href="<?php echo base_url('usuario/visualizar_todos'); ?>">Listar</a></li>
          <li class=""><a href="<?php echo base_url('usuario/cadastrar'); ?>">Adicionar</a></li>
          </ul>
        </li>
        <?php
        } 
        ?>
      </ul>
      <?php 
        if ($this->session->userdata('perfil')) {
      ?>
      <ul class="nav navbar-nav pull-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> <?=$this->session->userdata('nome'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li class=""><a href="<?php echo base_url('usuario/editar/'.$this->session->userdata('id')); ?>"><i class="glyphicon glyphicon-user"></i> Editar perfil</a></li>
          <li class=""><a href="<?php echo base_url('conta/sair'); ?>"><i class="glyphicon glyphicon-log-out"></i> Sair</a></li>
          </ul>
        </li>
      </ul>
      <?php
        } 
      ?>
    </div>
  </div>
</nav>
