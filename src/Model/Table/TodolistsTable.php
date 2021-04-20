<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TodolistsTable extends Table{


	public function initialize(array $c) :void{
		parent::initialize($c);
		$this->addBehavior('Timestamp');
		
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
			'joinType' => 'INNER'
		]);

		$this->hasMany('Items', [
			'foreignKey' => 'todolist_id',
			'joinType' => 'INNER',
			'dependent' => true,
			'cascadeCallbacks' => true
		]);
		
	}


	public function validationDefault(Validator $v) : Validator{

		$v->maxLength('titre', 30)
			->notEmptyString('titre');

		return $v;
	}

}