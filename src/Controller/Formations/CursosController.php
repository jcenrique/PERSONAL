<?php
namespace App\Controller\Formations;

use App\Controller\AppController;
use Cake\Core\Configure;
/**
 * Cursos Controller
 *
 * @property \App\Model\Table\CursosTable $Cursos
 */
class CursosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cursos = $this->Cursos->find('all');

        $this->set(compact('cursos'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Cursos->get($id);

        $this->set('curso', $curso);
        
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Cursos->newEntity();
        if ($this->request->is('post')) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->data);
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
       
        $this->set(compact('curso'));
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->data);
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
       
        $this->set(compact('curso'));
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        if ($this->Cursos->delete($curso)) {
            $this->Flash->success(Configure::read ('REGISTRO_ELIMINADO'));
        } else {
            $this->Flash->error(Configure::read ('REGISTRO_NO_ELIMINADO'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
