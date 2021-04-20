<h1>Créer un compte</h1>

<?= $this->Form->create($new) ?>
	
	<?= $this->Form->control('username') ?>
	<?= $this->Form->control('password') ?>
	<?= $this->Form->button('Créer un compte') ?>


<?= $this->Form->end() ?>