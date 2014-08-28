<?php
App::uses('AppModel', 'Model');
/**
 * Animal Model
 *
 */
class Animai extends AppModel {
	
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'animais';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'animal_id';

}
