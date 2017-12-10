<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
     public function home()
     {
         
     }
    
     
     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login' , 'register' , 'recuperar']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
         $this->paginate = [
            'contain' => ['Roles']
        ];
        
       
        $users = $this->paginate($this->Users);

        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('users', 'roles'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id,[
            'contain' => ['Roles']
        ]);

        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
      
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            print_r($this->request->data);
            $user = $this->Users->patchEntity($user, $this->request->data);
           
            if ($this->Users->save($user)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            print_r($this->request->data);
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->role_id=2;
            if ($this->Users->save($user)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(Configure::read ('REGISTRO_GUARDADO'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(Configure::read ('REGISTRO_NO_GUARDADO'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(Configure::read ('REGISTRO_ELIMINADO'));
        } else {
            $this->Flash->error(Configure::read ('REGISTRO_NO_ELIMINADO'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login (){
         if($this->request->is('post'))   
        {
            
            $user = $this->Auth->identify();
            if($user)
            {
             
                $this->Auth->setUser($user);
                if($user->role_id==1)
                {
                    return $this->redirect($this->Auth->redirectUrl());
                }
                else
                {
                     return  $this->redirect(['controller' => 'Users' , 'action' => 'home', $this->Auth->user('id')]);
                }
            }
            else
            {
                $this->Flash->error('Los datos no son validos, por favor intentelo de nuevo' , ['key' => 'auth']);
            }
        }
        
        if($this->Auth->user())
        {
            return  $this->redirect(['controller' => 'Users' , 'action' => 'view', $this->Auth->user('id')]);
        }
        
    }
    public function logout(){
        return $this->redirect($this->Auth->logout());
        
        
    }
    public function isAuthorized($user)
    {
         if(isset($user['role_id']) and $user ['role_id'] == 2){
           if(in_array($this->request->action, ['logout','register','home' ])){
            return true;
           }
           if(in_array($this->request->action, ['edit','view']))
            {
                
                $id = $this->request->params['pass'][0];
                
                if($user['id'] == $id)
                {
                     return true;
                }
             }
        }
        return parent::isAuthorized($user);
    }
    
    public function recuperar()
    {
        echo 'Pendiente de crear';
        exit();
    }
}
