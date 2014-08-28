<?php
App::uses('AppController', 'Controller');
/**
 * Animals Controller
 *
 * @property Animal $Animal
 * @property PaginatorComponent $Paginator
 */
class AnimaisController extends AppController {

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
		$this->Animai->recursive = 0;
		$this->set('animais', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Animai->exists($id)) {
			throw new NotFoundException(__('Invalid animais'));
		}
		$options = array('conditions' => array('Animai.animal_id' => $id));
		$this->set('animai', $this->Animai->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Animai->create();
			
			##dir C:\xampp\htdocs\fabrica-de-sonhos\admin\app\Controller
			if($this->request->data['Animai']['foto']){
				$dir = '../../app/webroot/imagens/';
				$file = $dir . $this->request->data['Animai']['foto']['name'];
				move_uploaded_file($this->request->data['Animai']['foto']['tmp_name'],$file);
				//exit(var_dump($this->request->data));
				
				$this->request->data['Animai']['foto'] = $this->request->data['Animai']['foto']['name'] ;
			}else{
				$this->request->data['Animai']['foto'] = '';	
			}
			
			if ($this->Animai->save($this->request->data)) {
				$this->Session->setFlash(__('The animal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The animais could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Animai->exists($id)) {
			throw new NotFoundException(__('Invalid animais'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//exit(var_dump($this->request->data['Animai']));
			##dir C:\xampp\htdocs\fabrica-de-sonhos\admin\app\Controller
			if(isset($this->request->data['Animai']['foto']['name']) && $this->request->data['Animai']['foto']['name']){
				$dir = '../../app/webroot/imagens/';
				$file = $dir . $this->request->data['Animai']['foto']['name'];
				move_uploaded_file($this->request->data['Animai']['foto']['tmp_name'],$file);
				//exit(var_dump($this->request->data));
				
				$this->request->data['Animai']['foto'] = $this->request->data['Animai']['foto']['name'] ;
			}else{
				$options = array('conditions' => array('Animai.' . $this->Animai->primaryKey =>$this->request->data['Animai']['animal_id']));
				$animal = $this->Animai->find('first', $options);
				$this->request->data['Animai']['foto'] = $animal['Animai']['foto'];	
			}
			
			if ($this->Animai->save($this->request->data)) {
				$this->Session->setFlash(__('The animais has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The animais could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Animai.animal_id' => $id));
			$this->request->data = $this->Animai->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Animai->id = $id;
		if (!$this->Animai->exists()) {
			throw new NotFoundException(__('Invalid animais'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Animai->delete()) {
			$this->Session->setFlash(__('The animais has been deleted.'));
		} else {
			$this->Session->setFlash(__('The animais could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
