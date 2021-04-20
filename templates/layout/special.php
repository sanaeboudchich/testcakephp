<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>
        <?= $cakeDescription ?> </title>
        
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css(['special']) ?>
        

        <?= $this->Html->css(['normalize.min', 'milligram.min', 'summernote-lite.min']) ?>
        <?= $this->Html->script(['jquery-3.4.1.slim.min', 'summernote-lite.min']) ?>

        <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

        <script>
    $(function(){
        $('varchar').summernote({
            toolbar : [
                ['style', ['style','bold', 'italic', 'underline', 'clear']],
                ['font', ['fontname', 'fontsize', 'color']]
            ]
        });
    })
    </script>
        </head>
        <body>
        <header>
       
        <!-- <a href="<?= $this->Url->build('/') ?>"><span>Upload</span> -->
        
        <nav>
        <div class="top-nav-links">
            <?= $this->Html->link('Home', ['controller'=>'Todolists', 'action' => 'index']) ?>

            <?php if($this->request->getAttribute('identity') == null) : ?>
                
                <?= $this->Html->link('Signup', ['controller'=>'Users', 'action' => 'new'],['class'=>($this->templatePath == 'Users' && $this->template == 'new') ?  'active' : '']) ?>
                <?= $this->Html->link('Login', ['controller'=>'Users', 'action' => 'login'],['class'=>($this->templatePath == 'Users' && $this->template == 'login') ?  'active' : '']) ?>
                

                
            <?php else : ?>
                <?= $this->Html->link('Ajouterliste', ['controller'=>'Todolists', 'action' => 'new'],['class'=>($this->templatePath == 'Todolists' && $this->template == 'new') ?  'active' : '']) ?>
                <?= $this->Html->link('Maliste', ['controller'=>'Todolists', 'action' => 'listper'],['class'=>($this->templatePath == 'Todolists' && $this->template == 'index') ?  'active' : '']) ?>
                <?= $this->Html->link('Logout', ['controller'=>'Users', 'action' => 'logout']) ?>
                <?= $this->Html->link('Moncompte', ['controller'=>'Users', 'action' => 'account',$this->request->getAttribute('identity')->id],['class'=>($this->templatePath == 'Users' && $this->template == 'view') ?  'active' : ''])  , ($this->request->getAttribute('identity')->id) ?>
                <span>Hello <?= $this->request->getAttribute('identity')->username ?></span>
            <?php endif; ?>

        </div></nav>
        
        
        </header>
        <section>
        
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        </section>
        
        
        
        </body>
        </html>