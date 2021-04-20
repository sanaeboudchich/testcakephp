
<!-- <h1>Se connecter</h1>

<?= $this->Form->create() ?>
	
	<?= $this->Form->control('username') ?>
	<?= $this->Form->control('password') ?>
	<?= $this->Form->button('Se connecter') ?>


<?= $this->Form->end ?> -->
 <div class="text-center my-5" >
<h1 class="text-center my-5">Se connecter</h1>
<?= $this->Form->create() ?>
  <div class="mb-3">
   
    <?= $this->Form->control('username') ?>
  </div>
  <div class="mb-3">
    
    <?= $this->Form->control('password') ?>
  </div>
  <?= $this->Form->button('Se connecter') ?>


   <?= $this->Form->end ?>

</div>