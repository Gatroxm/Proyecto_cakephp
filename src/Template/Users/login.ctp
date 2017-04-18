<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
	    <?= $this->Flash->render('auth') ?>
			<?= $this->Form->create() ?>
				<fieldset>
					<h2>Ingrese sus datos</h2>
					<hr class="colorgraph">
					<?php echo $this->Form->input('email', ['class' =>'input-lg', 'label' => false, 'placeholder' => 'Correo Electrónico', 'reqired']); ?>
					<?php echo $this->Form->input('password', ['class' =>'input-lg', 'label' => false, 'placeholder' => 'Contraseña', 'reqired']); ?>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
						<?php echo $this->Form->button('Acceder', ['class' => 'btn-lg btn-success btn-block']) ?>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<?php echo $this->Html->link('Registrame', ['controller' => 'Users', 'action' => 'add'],['class' => 'btn text-center btn-lg btn-primary btn-block']) ?>
						</div>
					</div>
				</fieldset>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>