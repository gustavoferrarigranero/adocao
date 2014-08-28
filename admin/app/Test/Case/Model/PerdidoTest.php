<?php
App::uses('Perdido', 'Model');

/**
 * Perdido Test Case
 *
 */
class PerdidoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.perdido',
		'app.usuario',
		'app.animal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Perdido = ClassRegistry::init('Perdido');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Perdido);

		parent::tearDown();
	}

}
