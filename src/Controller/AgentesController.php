<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
/**
 * Agentes Controller
 *
 * @property \App\Model\Table\AgentesTable $Agentes
 */
class AgentesController extends AppController
{

   
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($ids_Puesto=null)
    {
       
       
       
       if($ids_Puesto ==null){
            $agentes= $this->Agentes->find('all')
            ->contain(['Cargos', 'Residencias']);
       }else{
           echo $ids_Puesto;
      
         $agentes= $this->Agentes->find('all')
            ->contain(['Cargos', 'Residencias'])
            -> where ([ 'residencia_id IN '  => $ids_Puesto ]) ;
       }
        
        $this->set(compact('agentes'));
        
        $this->set('_serialize', ['agentes']);
    }
    public function exportarExcel()
    {
       
       
       
       
            $agentes= $this->Agentes->find('all')
            ->contain(['Cargos', 'Residencias'])
            ->order(['Cargos.cargo'=>'asc' , 'Residencias.residencia' => 'asc' , 'apellido1' => 'asc']);
            
            
       
        
        $this->set(compact('agentes'));
        
         $this->Render = false;
    }

    /**
     * View method
     *
     * @param string|null $id Agente id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agente = $this->Agentes->get($id, [
            'contain' => ['Cargos', 'Residencias']
        ]);
        
        $this->set('agente', $agente);
       
      
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agente = $this->Agentes->newEntity();
        if ($this->request->is('post')) {
            $agente = $this->Agentes->patchEntity($agente, $this->request->data);
            if ($this->Agentes->save($agente)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $cargos = $this->Agentes->Cargos->find('list', ['limit' => 200]);
        $residencias = $this->Agentes->Residencias->find('list', ['limit' => 200]);
        
        $this->set(compact('agente', 'cargos', 'residencias'));
        $this->set('_serialize', ['agente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agente id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agente = $this->Agentes->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agente = $this->Agentes->patchEntity($agente, $this->request->data);
            if ($this->Agentes->save($agente)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $cargos = $this->Agentes->Cargos->find('list', ['limit' => 200]);
        $residencias = $this->Agentes->Residencias->find('list');
       
       
        $this->set(compact('agente', 'cargos', 'residencias'));
       
    }

    /**
     * Delete method
     *
     * @param string|null $id Agente id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agente = $this->Agentes->get($id);
        if ($this->Agentes->delete($agente)) {
            $this->Flash->success(Configure::read ('REGISTRO_ELIMINADO'));
        } else {
            $this->Flash->error(Configure::read ('REGISTRO_NO_ELIMINADO'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
