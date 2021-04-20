<h1>ajouter une photo </h1>

<?= $this->Form->create($n,['enctype'=>'multipart/form-data']) ?>
 
<?= $this->Form->Control('picture',['label'=>'votre fichier',
'type'=>'file']) ?>

<?= $this->Form->Control('title',['label'=>'title']) ?>
<?= $this->Form->control('visibility',['type'=>'checkbox']) ?>
<?= $this->Form->button('Ajouter') ?>


<?= $this->Form->end() ?>