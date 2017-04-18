<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear Usuario</h2>
        </div>
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php
                echo $this->Form->input('first_name', ['label' => 'Nombre']);
                echo $this->Form->input('last_name', ['label' => 'Apellido']);
                echo $this->Form->input('email', ['label' => 'Correo']);
                echo $this->Form->input('password', ['label' => 'Contraseña']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Crear Usuaro')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>