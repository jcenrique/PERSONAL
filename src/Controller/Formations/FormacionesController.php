<?php
namespace App\Controller\Formations;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
/**
 * Formaciones Controller
 *
 * @property \App\Model\Table\FormacionesTable $Formaciones
 */
class FormacionesController extends AppController
{

 public function excel(){
    $this->layout='ajax';
    $this->response->type('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   
  }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
         $formaciones =$this->Formaciones->find('all', [
            'contain' => ['Cursos'],
            'order' => ['Formaciones.fecha_inicio' => 'DESC']
        ]);
       
       $tableAgentesFormations = TableRegistry::get('AgentesFormations');
       
         $agentesFormations = $tableAgentesFormations->find();
         
         $tablaAgentes = TableRegistry::get('Agentes'); 
         $agentes = $tablaAgentes->find();
       
        $this->set(compact('formaciones' ,'agentesFormations','agentes'));
       
    }
    
    public function _getAgente($idAgente)
    {
        $tablaAgentes = TableRegistry::get('Agentes'); 
         $agente = $tablaAgentes->find('nombre_completo',[
             where => ['id' => $idAgente]]);
            
        return $agente->nombre_completo;
    }

    /**
     * View method
     *
     * @param string|null $id Formacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formacione = $this->Formaciones->get($id);
        
       
       
        
       
        $this->set(compact('formacione' ));
        
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formacione = $this->Formaciones->newEntity();
        if ($this->request->is('post')) {
            $formacione = $this->Formaciones->patchEntity($formacione, $this->request->data);
            if ($this->Formaciones->save($formacione)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $cursos = $this->Formaciones->Cursos->find('list', ['limit' => 200]);
       
        $this->set(compact('formacione', 'cursos'));
        $this->set('_serialize', ['formacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formaciones = $this->Formaciones->get('', [
            'contain' => ['Agentes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formacione = $this->Formaciones->patchEntity($formacione, $this->request->data);
            if ($this->Formaciones->save($formacione)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $cursos = $this->Formaciones->Cursos->find('list', ['limit' => 200]);
       
        $this->set(compact('formacione', 'cursos'));
        $this->set('_serialize', ['formacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formacione = $this->Formaciones->get($id);
        if ($this->Formaciones->delete($formacione)) {
            $this->Flash->success(Configure::read ('REGISTRO_ELIMINADO'));
        } else {
            $this->Flash->error(Configure::read ('REGISTRO_NO_ELIMINADO'));
        }

        return $this->redirect(['action' => 'index']);
    }
   
    public function xlsxSpout($id = null) {
            
             $fileName = 'spreadsheet.xlsx';
             $formaciones =$this->Formaciones->find('all', [
            'contain' => ['Cursos'],
            'order' => ['Formaciones.fecha_inicio' => 'DESC']
        ]);
       
       $tableAgentesFormations = TableRegistry::get('AgentesFormations');
       
         $agentesFormations = $tableAgentesFormations->find();
         
         $tablaAgentes = TableRegistry::get('Agentes'); 
         $agentes = $tablaAgentes->find();
       
        $this->set(compact('formaciones' ,'agentesFormations','agentes' ,'filename'));
             $this->Render = false;
        }
        
       
}
