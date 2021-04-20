<?php

namespace App\Controller;

class TodolistsController extends AppController{
    
    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['index']);
    }

    public function new(){
        
        $n = $this->Todolists->newEmptyEntity();

        //si on a recu le formulaire
        if($this->request->is(['post','put'])){
            //on recuppere les donnees du formulaire form->patchEntity(getData)
            $n->title = $this->request->getData('title');
            $n->user_id = $this->request->getAttribute('identity')->id;
            $n->visibility = $this->request->getData('visibility');

            //si le fichier est vide ou n'est au bon format
            if( empty($this->request->getData('picture')->getClientFilename()) ||
            !in_array($this->request->getData('picture')->getClientMediaType(), ['image/png', 'image.jpg', 'image/jpeg', 'image/gif'])) {
                 //erreur
                 $this->Flash->error('erreur de type');
                }else{//sinon si tout va bien

                //on creer un nouveu nom pour le fichier
                $ext = pathinfo($this->request->getData('picture')->getClientFilename(),PATHINFO_EXTENSION);
                $newName = 'pict-'.time().'-'.rand(0,99999999).'.'.$ext;

                //on place ce nouveau nom dans l'entité
                $n->picture = $newName;
                //on tente la sauvegarde dans la base
                if($this->Todolists->save($n)){
                    //on deplace le fichier de la memoire temporaire vers notre dissier date
                    $this->request->getData('picture')->moveTo(WWW_ROOT.'img/data/todolists/'.$newName);

                    //message de confirmation
                    $this->Flash->success('bravo');
                         //redirection
                         return $this->redirect(['controller'=>'Todolists','action' => 'index']);
                }else{//sinon pas de sauvgarde
                         //errur
                         $this->Flash->error('impossible');
                     //fin sinoon pas sauv

                    }    }//fin sionn ok
         //fin reception form
        }
        $this->set(compact('n'));
    }


    public function index(){
        //  $this->viewBuilder()->setLayout('special');
        //on recup toutes les images
        $imgs = $this->Todolists->find('all',['contain'=>['Users','Items.Todolists']]);

        $this->loadModel('Items');
        $newItem = $this->Items->newEmptyEntity();
        $this->set(compact('imgs','newItem'));
      


    }

    public function listper(){
        // $this->viewBuilder()->setLayout('special');
        
        //on recup toutes les images
    
        $imgs = $this->Todolists->find('all',['contain'=>['Users','Items.Todolists']]);

        $this->loadModel('Items');
        $newItem = $this->Items->newEmptyEntity();
        $this->set(compact('imgs','newItem'));
        

    }

    public function delete($id = null){
        $this->request->allowMethod(['post','delete']);
        $track = $this->Todolists->get($id);
        if($this->Todolists->delete($track)){
            $this->Flash->success('suprimer');
        }else{
            $this->Flash->error('impossible');
        }return $this->redirect(['controller'=>'Todolists','action' => 'index']);
    }
   
    public function edit($id){

        // $this->viewBuilder()->setLayout('special');
         $q = $this->Todolists->get($id);
       
        // $q = $this->Todolists->newEmptyEntity();
			// $z = $q->avatar;
		   //si on est en post (ou en put)
			if($this->request->is(['post', 'put'])){
				
                $q->title = $this->request->getData('title');
            $q->user_id = $this->request->getAttribute('identity')->id;
            $q->visibility = $this->request->getData('visibility');

                    if( empty($this->request->getData('picture')->getClientFilename()) ||
                    !in_array($this->request->getData('picture')->getClientMediaType(), ['image/png', 'image.jpg', 'image/jpeg', 'image/gif'])) {
                         //erreur
                         $this->Flash->error('erreur de type');
                        }else{//sinon si tout va bien
        
                        //on creer un nouveu nom pour le fichier
                        $ext = pathinfo($this->request->getData('picture')->getClientFilename(),PATHINFO_EXTENSION);
                        $newName = 'pict-'.time().'-'.rand(0,99999999).'.'.$ext;
        
                        //on place ce nouveau nom dans l'entité
                        $q->picture = $newName;
                        
                        //on tente la sauvegarde dans la base
        if($this->Todolists->save($q)){
            $this->request->getData('picture')->moveTo(WWW_ROOT.'img/data/todolists/'.$newName);
            
            $this->Flash->success('éléments modifier');
            return $this->redirect(['controller'=>'Todolists','action' => 'index']);
        }
        $this->Flash->error('error');
        
    }}
        $this->set(compact('q'));
    } 

	public function add($title,$todolist_id,$content){
        $q = $this->Todolists->newEmptyEntity();

        //si on a recu le formulaire
        if($this->request->is(['post','put'])){
            //on recuppere les donnees du formulaire form->patchEntity(getData)
            $q->title = $title;
            $q->user_id = $this->request->getAttribute('identity')->id;
           
            // $q->picture = $picture;
        if($this->Todolists->save($q)){
            //on deplace le fichier de la memoire temporaire vers notre dissier date
           

            //message de confirmation
            $this->Flash->success('b');
            $this->set(compact('q'));
                 //redirection
                 return $this->redirect(['controller'=>'Items','action' => 'add',$todolist_id,$content]);
        }}

                
    }
}
