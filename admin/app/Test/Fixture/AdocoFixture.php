<?php
/**
 * AdocoFixture
 *
 */
class AdocoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'adocoes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'adocao_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'animal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'local' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cidade' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'adocao_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'adocao_id' => 1,
			'usuario_id' => 1,
			'animal_id' => 1,
			'local' => 'Lorem ipsum dolor sit amet',
			'cidade' => 'Lorem ipsum dolor sit amet',
			'status' => 1
		),
	);

}
