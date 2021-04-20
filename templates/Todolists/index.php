<h2>To do list</h2>

<article class="todolist">
<?php foreach ($imgs as $img): ?>
<?php if ($img->visibility == 1) :?>
<figure>
<?php if ($img->picture != null) : ?>
    
<?= $this->Html->image('data/todolists/'.$img->picture,['alt'=>$img->title]) ?>
<?php endif; ?>
<?php if ($img->picture == null) : ?>
    <img src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png">
<?php endif; ?>
</figure>


<p><span>Auteur :</span> <?= $img->user->username ?></p>
<?= $this->Form->postLink('Voir le profil', ['controller'=>'Users','action' => 'index', $img->user->id]) ?> 

<p><span>Creer le :</span> <?= $img->created ?></p>
<p><span>Modifier le :</span> <?= $img->modified ?></p>





<footer>
<h4>elements (<?= count($img->items) ?> )  </h4>
<?php foreach ($img->items as $c ): ?>

<p> Deadline :  <?= $c->deadline ?>   </p>
<p> Statut :  <?= $c->status?>   </p>
<p>le commentaire : <?= $c->content  ?>   </p> 
<?= $this->Form->postLink('Copier', ['controller'=>'Todolists','action' => 'add',$img->title,$c->todolist_id,$c->content]) ?> 

<?php endforeach ?>


</footer>

<?php endif; ?>

<?php endforeach ?>







</article>
