<?php  ?>

<h1>Ajouter a ma liste</h1>

<?= $this->Form->create($q) ?>
<?= $this->Form->create($q,['enctype'=>'multipart/form-data']) ?>
 
 
    <?= $this->Form->Control('picture',['label'=>'votre fichier','type'=>'file']) ?>

    <?= $this->Form->Control('title',['label'=>'title']) ?>
    <?= $this->Form->control('visibility',['type'=>'checkbox']) ?>
    
	<?= $this->Form->button('Modifier') ?>

<?= $this->Form->end() ?>