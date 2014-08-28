<?php
App::uses('AppController', 'Controller');
/**
 * Depoimentos Controller
 *
 * @property Depoimento $Depoimento
 * @property PaginatorComponent $Paginator
 */
class DepoimentosController extends AppController {

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
		$this->Depoimento->recursive = 0;
		$this->set('depoimentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Depoimento->exists($id)) {
			throw new NotFoundException(__('Invalid depoimento'));
		}
		$options = array('conditions' => array('Depoimento.' . $this->Depoimento->primaryKey => $id));
		$this->set('depoimento', $this->Depoimento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Depoimento->create();
			if ($this->Depoimento->save($this->request->data)) {
				$this->Session->setFlash(__('The depoimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The depoimento could not be saved. Please, try again.'));
			}
		}
		$animals = $this->Depoimento->Animai->find('list');
		$usuarios = $this->Depoimento->Usuario->find('list');
		$this->set(compact('animals', 'usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Depoimento->exists($id)) {
			throw new NotFoundException(__('Invalid depoimento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Depoimento->save($this->request->data)) {
				$this->Session->setFlash(__('The depoimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The depoimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Depoimento.' . $this->Depoimento->primaryKey => $id));
			$this->request->data = $this->Depoimento->find('first', $options);
		}
		$animals = $this->Depoimento->Animai->find('list');
		$usuarios = $this->Depoimento->Usuario->find('list');
		$this->set(compact('animals', 'usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Depoimento->id = $id;
		if (!$this->Depoimento->exists()) {
			throw new NotFoundException(__('Invalid depoimento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Depoimento->delete()) {
			$this->Session->setFlash(__('The depoimento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The depoimento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
