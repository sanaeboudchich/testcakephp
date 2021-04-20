<?php

namespace App\Controller;

class UsersController extends AppController{

	public function beforeFilter(\Cake\Event\EventInterface $e) {
	    parent::beforeFilter($e);
	    //autorise l'action login et add de ce controller seulement
	    $this->Authentication->addUnauthenticatedActions(['login', 'new','view','edit']);
	}

	public function index($id = null){
		$user = $this->Users->get($id,['contain'=>'Todolists.Items']);
		// $users = $this->Users->find('all');
		//  $this->Authorization->skipAuthorization();
		$this->set(compact('user'));
	}

	public function new(){

		// $this->viewBuilder()->setLayout('special');
		$new = $this->Users->newEmptyEntity();
		if($this->request->is('post')){
			$new = $this->Users->patchEntity($new, $this->request->getData());
			if($this->Users->save($new)){
				$this->Flash->success('Welcome');
				return $this->redirect(['controller' => 'Users', 'action' => 'login']);
			}else{
				$this->Flash->error('Try again');
			}
		}
		$this->set(compact('new'));
	}
	public function delete($id = null){
        $this->request->allowMethod(['post','delete']);
        $track = $this->Users->get($id);
        if($this->Users->delete($track)){
            $this->Flash->success('le user est suprimer');
			return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }else{
            $this->Flash->error('impossible');
        }return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

	public function login(){
		// $this->viewBuilder()->setLayout('special');
		if($this->request->is(['post'])){

			$res = $this->Authentication->getResult();

			if($res->isValid()){
				$this->Flash->success('Welcome back');
				return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
			}else{
				$this->Flash->error('Identifiants incorrects');
			}
		}
	}

    public function logout(){

        $result = $this->Authentication->getResult();
        $this->Authentication->logout();
        $this->Flash->success('See you soon');
        return $this->redirect(['action' => 'login']);

    }
	public function view($id = null){
		$user = $this->Users->get($id,['contain'=>'Todolists.Items']);
		//  $this->Authorization->skipAuthorization();
		// $this->set(compact('user'));

		$this->loadModel('Items');
        $newItem = $this->Items->newEmptyEntity();
        $this->set(compact('user','newItem'));
		
	}

	Public function account($id = null){
		// $this->viewBuilder()->setLayout('special');
		$user = $this->Users->get($id,['contain'=>'Todolists.Items']);
		$this->set(compact('user'));
	}
	
	public function edit($id){

			$q = $this->Users->get($id);
			$z = $q->avatar;
		   //si on est en post (ou en put)
			if($this->request->is(['post', 'put'])){
				$q->username = $this->request->getData('username');
				
				if( empty($this->request->getData('avatar')->getClientFilename()) ||
				!in_array($this->request->getData('avatar')->getClientMediaType(), ['image/png', 'image.jpg', 'image/jpeg', 'image/gif'])) {
					
					$this->Flash->error('erreur de type');
				}else{
					$ext = pathinfo($this->request->getData('avatar')->getClientFilename(),PATHINFO_EXTENSION);
					$newName = 'pict-'.time().'-'.rand(0,99999999).'.'.$ext;

					//on place ce nouveau nom dans l'entité
					
					$q->avatar = $newName; 
					
					var_dump($q);
					if (!empty($this->request->getData('newpassword'))){
						$q->password = $this->request->getData('newpassword');
					}
					if($this->Users->save($q)){
						$this->request->getData('avatar')->moveTo(WWW_ROOT.'img/data/todolists/'.$newName);
						unlink(WWW_ROOT.'img/data/todolists/'.$z);
						$this->Flash->success('modifier');
						 return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
					}
					$this->Flash->error('error');
				}
			}
			$this->set(compact('q'));
	}
}

