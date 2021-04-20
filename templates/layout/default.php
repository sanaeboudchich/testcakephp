<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['special','bootstrap/css/bootstrap.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-image: linear-gradient( 90.5deg,  rgba(255,207,139,0.50) 1.1%, rgba(255,207,139,1) 81.3% );">
  <div class="container-fluid">
    <a class="navbar-brand margin-top: -5px" href="#">TO DO LIST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end pe-5" id="navbarNav">
      <ul class="navbar-nav ml-auto text-right">
        <li class="nav-item me-3">
        <?= $this->Html->link('Home', ['controller'=>'Todolists', 'action' => 'index'],['class'=>'nav-link']) ?>
        </li>
        <?php if($this->request->getAttribute('identity') == null) : ?>
        <li class="nav-item  me-3">
        <?= $this->Html->link('Sign up', ['controller'=>'Users', 'action' => 'new'],['class'=>'nav-link']) ?>
                
        </li>
        <li class="nav-item me-3">
        <?= $this->Html->link('Log in', ['controller'=>'Users', 'action' => 'login'],['class'=>'nav-link']) ?>
                
        </li>
        <li class="nav-item me-3">
        <?php else : ?>
        <?= $this->Html->link('Ajouter liste', ['controller'=>'Todolists', 'action' => 'new'],['class'=>'nav-link']) ?>
                
        </li>
        <li class="nav-item me-3">
        <?= $this->Html->link('Mes listes', ['controller'=>'Users', 'action' => 'view',$this->request->getAttribute('identity')->id],['class'=>'nav-link']) ?>
                    
        </li>
        <li class="nav-item me-3">
        <?= $this->Html->link('Log out', ['controller'=>'Users', 'action' => 'logout'],['class'=>'nav-link']) ?>
                        
        </li>
        <li class="nav-item me-3">
        <?= $this->Html->link('Mon compte', ['controller'=>'Users', 'action' => 'account',$this->request->getAttribute('identity')->id],['class'=>'nav-link']) ?>
                  
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

    <main class="main">
        <div class="container">
                   
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
