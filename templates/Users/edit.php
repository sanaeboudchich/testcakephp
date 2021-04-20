

<div class="card" style="width: 20rem;">
<div class="row bg-light mb-5 p-5">
  <div class="card-body">
    <h5 class="card-title">Modifier mon profile</h5>
    
    <?= $this->Form->create($q,['enctype'=>'multipart/form-data']) ?>
    <?= $this->Form->control('avatar',['label'=>'votre photo da profile','type'=>'file']) ?>

    <?= $this->Form->control('username',['label'=>'username']) ?>
    <?= $this->Form->control('newpassword',['label'=>'password','type'=>'password']) ?>
    
    <?= $this->Form->button('Modifier') ?>

<?= $this->Form->end() ?>
  </div>
</div>
 
    </div>