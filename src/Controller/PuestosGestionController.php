<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * PuestosGestion Controller
 *
 * @property \App\Model\Table\PuestosGestionTable $PuestosGestion
 */
class PuestosGestionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $puestosGestion = $this->PuestosGestion->find('all');

        $this->set(compact('puestosGestion'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Puestos Gestion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $puestosGestion = $this->PuestosGestion->get($id, [
            'contain' => []
        ]);

        $this->set('puestosGestion', $puestosGestion);
        $this->set('_serialize', ['puestosGestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $puestosGestion = $this->PuestosGestion->newEntity();
        if ($this->request->is('post')) {
            $puestosGestion = $this->PuestosGestion->patchEntity($puestosGestion, $this->request->data);
            if ($this->PuestosGestion->save($puestosGestion)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro no ha se ha guardado. Por favor, intentelo de nuevo.'));
        }
        $this->set(compact('puestosGestion'));
        $this->set('_serialize', ['puestosGestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Puestos Gestion id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $puestosGestion = $this->PuestosGestion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $puestosGestion = $this->PuestosGestion->patchEntity($puestosGestion, $this->request->data);
            if ($this->PuestosGestion->save($puestosGestion)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $this->set(compact('puestosGestion'));
        $this->set('_serialize', ['puestosGestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Puestos Gestion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $puestosGestion = $this->PuestosGestion->get($id);
        if ($this->PuestosGestion->delete($puestosGestion)) {
            $this->Flash->success(Configure::read ('REGISTRO_ELIMINADO'));
        } else {
            $this->Flash->error(Configure::read ('REGISTRO_NO_ELIMINADO'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
