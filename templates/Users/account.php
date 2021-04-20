
<div class="card" style="width: 20rem;" >
<div class="row bg-light mb-12 p-12">
<?php if ($user->avatar != null) : ?>
    
    <?= $this->Html->image('data/todolists/'.$user->avatar) ?>
    <?php endif; ?>
    <?php if ($user->avatar == null) : ?>
        <img src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png">
    <?php endif; ?>
  <div class="card-body">
    <h5 class="card-title">Mon profile</h5>
    <p class="card-text"><p>@<?= $user->username?></p></p>
  </div>
  <div class="card-body">
  <?php foreach ($user->todolists as $todolist) :
  $i = 0;
  foreach ($todolist->items as $item) :
    if($item->status != 0) :
      $i++;
    endif;
  endforeach;
endforeach; ?>
    <h5 class="card-title">Mon profile</h5>
    <p class="card-text"><p>@<?= $todolist->count  ?></p></p>
    
  </div>
 
  
  <?= $this->Form->postLink('Suprimer mon compte', ['controller'=>'Users','action' => 'delete', $user->id]) ?>             
  <?= $this->Html->link('Modifier Mon profile',['controller'=>'Users','action'=>'edit',$user->id], ['class'=> 'button'],['confirm'=>'sur?']) ?>
  </div>
    </div>









