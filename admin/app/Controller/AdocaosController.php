<?php
App::uses('AppController', 'Controller');
/**
 * Adocaos Controller
 *
 * @property Adocao $Adocao
 * @property PaginatorComponent $Paginator
 */
class AdocaosController extends AppController {

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
		$this->Adocao->recursive = 0;
		$this->set('adocos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Adocao->exists($id)) {
			throw new NotFoundException(__('Adoção Inválida'));
		}
		$options = array('conditions' => array('Adocao.' . $this->Adocao->primaryKey => $id));
		$this->set('adoco', $this->Adocao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Adocao->create();
			if ($this->Adocao->save($this->request->data)) {
				$this->Session->setFlash(__('Adoção salva.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A adoção nao foi salva. Tente novamente.'));
			}
		}
		$usuarios = $this->Adocao->Usuario->find('list');
		$animals = $this->Adocao->Animai->find('list');
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
		if (!$this->Adocao->exists($id)) {
			throw new NotFoundException(__('Adoção Inválida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Adocao->save($this->request->data)) {
				$this->Session->setFlash(__('The adoco has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A adoção nao foi salva. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Adocao.' . $this->Adocao->primaryKey => $id));
			$this->request->data = $this->Adocao->find('first', $options);
		}
		$usuarios = $this->Adocao->Usuario->find('list');
		$animals = $this->Adocao->Animai->find('list');
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
		$this->Adocao->id = $id;
		if (!$this->Adocao->exists()) {
			throw new NotFoundException(__('Adoção Inválida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Adocao->delete()) {
			$this->Session->setFlash(__('A adoção foi deletada.'));
		} else {
			$this->Session->setFlash(__('A adoção não foi deletada. Tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
