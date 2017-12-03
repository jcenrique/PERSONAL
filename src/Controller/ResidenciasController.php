<?php
namespace App\Controller;

use App\Controller\AppController;

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
        
        $this->paginate = [
            'contain' => ['PuestosGestion','Agentes']
        ];
        $residencias = $this->paginate($this->Residencias);

        $this->set(compact('residencias'));
        $this->set('_serialize', ['residencias']);
    }

    /**
     * View method
     *
     * @param string|null $id Residencia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $residencia = $this->Residencias->get($id, [
            'contain' => ['PuestosGestion', 'Agentes']
        ]);
    
       
        $this->set ('residencia',$residencia);
        $this->set('_serialize', ['residencia']);
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
                $this->Flash->success(__('The residencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The residencia could not be saved. Please, try again.'));
        }
        $puestosGestion = $this->Residencias->PuestosGestion->find('list', ['limit' => 200]);
        $this->set(compact('residencia', 'puestosGestion'));
        $this->set('_serialize', ['residencia']);
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
                $this->Flash->success(__('The residencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The residencia could not be saved. Please, try again.'));
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
            $this->Flash->success(__('The residencia has been deleted.'));
        } else {
            $this->Flash->error(__('The residencia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
