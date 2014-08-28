<?php
App::uses('Depoimento', 'Model');

/**
 * Depoimento Test Case
 *
 */
class DepoimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.depoimento',
		'app.animal',
		'app.usuario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Depoimento = ClassRegistry::init('Depoimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Depoimento);

		parent::tearDown();
	}

}
