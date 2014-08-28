<?php
App::uses('AppModel', 'Model');
/**
 * Perdido Model
 *
 * @property Usuario $Usuario
 * @property Animal $Animal
 */
class Perdido extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'perdido_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Animai' => array(
			'className' => 'Animai',
			'foreignKey' => 'animal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
