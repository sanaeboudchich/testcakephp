<?php  ?>

<h1>Modifier un élément</h1>

<?= $this->Form->create($q) ?>
	
	<?= $this->Form->control('content', ['label' => 'Contenu', 'class' => 'lasuperclass']) ?>
	<?= $this->Form->control('status',['type'=>'checkbox']) ?>

	
	<?= $this->Form->button('Modifier') ?>

<?= $this->Form->end() ?>