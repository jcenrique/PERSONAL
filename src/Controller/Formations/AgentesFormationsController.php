<?php
namespace App\Controller\Formations;

use App\Controller\AppController;
use Cake\Core\Configure;
/**
 * AgentesFormations Controller
 *
 * @property \App\Model\Table\AgentesFormationsTable $AgentesFormations
 */
class AgentesFormationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $agentesFormations = $this->AgentesFormations->find ('all', [
            'contain' => ['Formaciones', 'Agentes'],
            
        ]);
       

        $this->set(compact('agentesFormations' ));
       
    }

    /**
     * View method
     *
     * @param string|null $id Agentes Formation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agentesFormation = $this->AgentesFormations->get($id, [
            'contain' => ['Formaciones', 'Agentes']
        ]);

        $this->set('agentesFormation', $agentesFormation);
        $this->set('_serialize', ['agentesFormation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idFormation =null)
    {
        $agentesFormation = $this->AgentesFormations->newEntity();
        if ($this->request->is('post')) {
         
            $agentesFormation = $this->AgentesFormations->patchEntity($agentesFormation, $this->request->data);
            
            if ($this->AgentesFormations->save($agentesFormation)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return    $this->redirect($this->referer());
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $formaciones = $this->AgentesFormations->Formaciones
            ->find('list')
           ->where(['id'  => $idFormation]);
            
       
        $agentes = $this->AgentesFormations->Agentes->find('list', ['limit' => 200]);
        $this->set(compact('agentesFormation', 'formaciones', 'agentes'));
        $this->set('_serialize', ['agentesFormation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agentes Formation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agentesFormation = $this->AgentesFormations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agentesFormation = $this->AgentesFormations->patchEntity($agentesFormation, $this->request->data);
            if ($this->AgentesFormations->save($agentesFormation)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return  $this->redirect($this->referer());
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $formaciones = $this->AgentesFormations->Formaciones->find('list', ['limit' => 200]);
        $agentes = $this->AgentesFormations->Agentes->find('list', ['limit' => 200]);
        $this->set(compact('agentesFormation', 'formaciones', 'agentes'));
        $this->set('_serialize', ['agentesFormation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Agentes Formation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);
        
        $agentesFormation = $this->AgentesFormations->get($id);
        debug($agentesFormation);
        if ($this->AgentesFormations->delete($agentesFormation)) {
            $this->Flash->success(Configure::read ('REGISTRO_ELIMINADO'));
        } else {
            $this->Flash->error(Configure::read ('REGISTRO_NO_ELIMINADO'));
        }

        return  $this->redirect($this->referer());
    }
}
