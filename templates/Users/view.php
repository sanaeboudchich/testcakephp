

<?php foreach ($user->todolists as $t)  : ?>
<div class="row" style="width: 25em;">
<?php if ($t->picture != null) : ?>
     <?= $this->Html->image('data/todolists/'.$t->picture,['alt'=>$t->title]) ?>
    <?php endif; ?>
    <?php if ($t->picture == null) : ?>
        <img src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png" class="rounded mx-auto d-block">
    <?php endif; ?>
  
  <div class="card-body">
    <h3 class="card-text"><?= $t->title ?></h3>
  <?= $this->Form->postLink('Supprimer la liste',['controller'=>'Todolists','action'
=>'delete',$t->id], ['class'=> 'button'],['confirm'=>'sur?']) ?>



<?= $this->Html->link('Modifier la listes',['controller'=>'Todolists','action'
=>'edit',$t->id], ['class'=> 'button'],['confirm'=>'sur?']) ?>
 
 <?php foreach ($t->items as $item)  : ?>
        <h5>l'element : </h5>
        <p class="card-text">Deadline :  <?= $item->deadline ?>   </p>
        <p> Statut :  <?= $item->status?>   </p>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
        <p>l'element' : <?= $item->content  ?>   </p> 
        </label>
</div>
<?= $this->Form->postLink('Modifier', ['controller'=>'Items','action' => 'edit', $item->id]) ?> 
<?= $this->Form->postLink('Suprimer', ['controller'=>'Items','action' => 'delete', $item->id]) ?> 
<?= $this->Form->postLink('ajouter un elements', ['controller'=>'Items','action' => 'new', $item->id]) ?> 

 
<?php endforeach; ?>
</div>
</div>
<?= $this->Form->create($newItem, ['url'=>['controller'=>'Items','action'=>'new']]) ?>
        <?= $this->Form->hidden('todolist_id',['value'=>$t->id]) ?>
        
        <?= $this->Form->control('content', ['label'=>'Ajouter un commentaire']) ?>
        <?= $this->Form->control('deadline', ['label'=>'deadline']) ?>
        <?= $this->Form->control('status',['type'=>'checkbox']) ?>
      

        <?= $this->Form->button('Ajouter') ?>
        <?= $this->Form->end() ?>
<?php endforeach; ?>