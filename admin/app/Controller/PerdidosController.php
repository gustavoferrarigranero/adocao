<?php
App::uses('AppController', 'Controller');
/**
 * Perdidos Controller
 *
 * @property Perdido $Perdido
 * @property PaginatorComponent $Paginator
 */
class PerdidosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Perdido->recursive = 0;
		$this->set('perdidos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Perdido->exists($id)) {
			throw new NotFoundException(__('Invalid perdido'));
		}
		$options = array('conditions' => array('Perdido.' . $this->Perdido->primaryKey => $id));
		$this->set('perdido', $this->Perdido->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Perdido->create();
			if ($this->Perdido->save($this->request->data)) {
				$this->Session->setFlash(__('The perdido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perdido could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Perdido->Usuario->find('list');
		$animals = $this->Perdido->Animai->find('list');
		$this->set(compact('usuarios', 'animals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Perdido->exists($id)) {
			throw new NotFoundException(__('Invalid perdido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Perdido->save($this->request->data)) {
				$this->Session->setFlash(__('The perdido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perdido could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Perdido.' . $this->Perdido->primaryKey => $id));
			$this->request->data = $this->Perdido->find('first', $options);
		}
		$usuarios = $this->Perdido->Usuario->find('list');
		$animals = $this->Perdido->Animai->find('list');
		$this->set(compact('usuarios', 'animals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Perdido->id = $id;
		if (!$this->Perdido->exists()) {
			throw new NotFoundException(__('Invalid perdido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Perdido->delete()) {
			$this->Session->setFlash(__('The perdido has been deleted.'));
		} else {
			$this->Session->setFlash(__('The perdido could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
