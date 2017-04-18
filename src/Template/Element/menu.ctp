<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?= $this->Html->link('POCAKE', ['controller' => 'Users', 'action' => 'index'], ['class' => 'navbar-brand']); ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link('Listar Usuarios', ['controller' => 'Users', 'action' => 'index']); ?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link('Crear Usuarios', ['controller' => 'Users', 'action' => 'add']); ?></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <?= $this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout']); ?>
        </li>
      </ul>
    </div>
  </div>
</nav>