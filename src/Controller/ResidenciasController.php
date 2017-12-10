<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
/**
 * Residencias Controller
 *
 * @property \App\Model\Table\ResidenciasTable $Residencias
 */
class ResidenciasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
        
        $residencias = $this->Residencias->find('all' ,[
            'contain' => ['PuestosGestion']
        ]);

        $this->set(compact('residencias'));
       
    }

  

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $residencia = $this->Residencias->newEntity();
        if ($this->request->is('post')) {
            $residencia = $this->Residencias->patchEntity($residencia, $this->request->data);
            if ($this->Residencias->save($residencia)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $puestosGestion = $this->Residencias->PuestosGestion->find('list', ['limit' => 200]);
        $this->set(compact('residencia', 'puestosGestion'));
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Residencia id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $residencia = $this->Residencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $residencia = $this->Residencias->patchEntity($residencia, $this->request->data);
            if ($this->Residencias->save($residencia)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $puestosGestion = $this->Residencias->PuestosGestion->find('list', ['limit' => 200]);
        $this->set(compact('residencia', 'puestosGestion'));
        $this->set('_serialize', ['residencia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Residencia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $residencia = $this->Residencias->get($id);
        if ($this->Residencias->delete($residencia)) {
            $this->Flash->success(Configure::read ('REGISTRO_ELIMINADO'));
        } else {
            $this->Flash->error(Configure::read ('REGISTRO_NO_ELIMINADO'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
