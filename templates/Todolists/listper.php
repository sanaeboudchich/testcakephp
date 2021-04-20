<h2>To do list</h2>

<article class="todolist">

<?php foreach ($imgs as $img): ?>
    <?php if ( $q = $img->user_id ) :?>
        
<figure>
<?= $this->Html->image('data/todolists/'.$img->picture,['alt'=>$img->title]) ?>
<figcaption>
<p><span>Auteur :</span> <?= $img->user->username ?></p>
<?= $this->Form->postLink('Voir le profil', ['controller'=>'Todolists','action' => 'show', $img->user->id]) ?> 
<p><span>Creer le :</span> <?= $img->created ?></p>
<p><span>Modifier le :</span> <?= $img->modified ?></p>

<?= $this->Form->postLink('Supprimer la liste',['controller'=>'Todolists','action'
=>'delete',$img->id], ['class'=> 'button'],['confirm'=>'sur?']) ?>



<?= $this->Html->link('Modifier la listes',['controller'=>'Todolists','action'
=>'edit',$img->id], ['class'=> 'button'],['confirm'=>'sur?']) ?>
</figcaption>


</figure>
<footer>
<h4>elements (<?= count($img->items) ?> )  </h4>
<?php foreach ($img->items as $c ): ?>
<p> Deadline :  <?= $c->deadline ?>   </p>
<p> Statut :  <?= $c->status?>   </p>
<p>le commentaire : <?= $c->content  ?>   </p>
<?= $this->Form->postLink('Modifier', ['controller'=>'Items','action' => 'edit', $c->id]) ?> 
<?= $this->Form->postLink('Suprimer', ['controller'=>'Items','action' => 'delete', $c->id]) ?> 
<?php endforeach ?>
     

        <?= $this->Form->create($newItem, ['url'=>['controller'=>'Items','action'=>'new']]) ?>
        <?= $this->Form->hidden('todolist_id',['value'=>$img->id]) ?>
        <?= $this->Form->control('content', ['label'=>'Ajouter un commentaire']) ?>
        <?= $this->Form->control('deadline', ['label'=>'deadline']) ?>
        <?= $this->Form->control('status',['type'=>'checkbox']) ?>
      

        <?= $this->Form->button('Ajouter') ?>
        <?= $this->Form->end() ?>
    
        <?php endif; ?>
</footer>



<?php endforeach ?>







</article>
