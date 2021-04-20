
<?php foreach ($user->todolists as $t)  : ?>
<div class="row" style="width: 40rem;">
<?php if ($t->visibility == 1) : ?>
<?php if ($t->picture != null) : ?>
    
    <?= $this->Html->image('data/todolists/'.$t->picture,['alt'=>$t->title]) ?>
    <?php endif; ?>
    <?php if ($t->picture == null) : ?>
        <img src="https://images-ext-1.discordapp.net/external/tvwG0a8im3V7mGl9HzPJmKQQfmEsCFI32W6cJwLR3Zo/https/bulma.io/images/placeholders/128x128.png" >
    <?php endif; ?>
    <?php endif; ?>
  <div class="card-body">
    <h3 class="card-text"><?= $t->title ?></h3>
  
    
 <?php foreach ($t->items as $items)  : ?>
    
        <h5>l'element : </h5>
        <p class="card-text">Deadline :  <?= $items->deadline ?>   </p>
        <p> Statut :  <?= $items->status?>   </p>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
        <p>l'element' : <?= $items->content  ?>   </p> 
        </label>    
       
</div>

  </div>
  
</div>



<?php endforeach; ?>
<?php endforeach; ?>