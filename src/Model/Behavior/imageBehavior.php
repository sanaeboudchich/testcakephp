<?php

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use ArrayObject;

Class ImageBehavior extends Behavior{

    //lorsque on supprime l'entité son fichier file est suprimé du serveur
    public function beforeDelete(Event $event,EntityInterface $entity, ArrayObject $options){
        if( !empty($entity->file) && file_exists(WWW_ROOT.'img/data/todolists/'.$entity->file))
        unlink(WWW_ROOT.'img/data/todolists/'.$entity->file);
    }

}