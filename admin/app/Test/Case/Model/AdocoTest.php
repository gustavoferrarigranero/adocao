<?php
App::uses('Adoco', 'Model');

/**
 * Adoco Test Case
 *
 */
class AdocoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.adoco',
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
		$this->Adoco = ClassRegistry::init('Adoco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adoco);

		parent::tearDown();
	}

}
