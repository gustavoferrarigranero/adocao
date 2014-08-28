<?php
App::uses('AppModel', 'Model');
/**
 * Depoimento Model
 *
 * @property Animal $Animal
 * @property Usuario $Usuario
 */
class Depoimento extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'depoimento_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Animai' => array(
			'className' => 'Animai',
			'foreignKey' => 'animal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
