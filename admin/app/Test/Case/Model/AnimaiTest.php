<?php
App::uses('Animai', 'Model');

/**
 * Animai Test Case
 *
 */
class AnimaiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.animai'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Animai = ClassRegistry::init('Animai');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Animai);

		parent::tearDown();
	}

}
