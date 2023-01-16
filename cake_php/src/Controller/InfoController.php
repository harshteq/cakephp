<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Info Controller
 *
 * @property \App\Model\Table\InfoTable $Info
 * @method \App\Model\Entity\Info[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InfoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $info = $this->paginate($this->Info);

        $this->set(compact('info'));
    }

    /**
     * View method
     *
     * @param string|null $id Info id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $info = $this->Info->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('info'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $info = $this->Info->newEmptyEntity();
        if ($this->request->is('post')) {
            $info = $this->Info->patchEntity($info, $this->request->getData());

            if (!$info->getErrors) {

                $image = $this->request->getData('image_file');
    
                $name = $image->getClientFilename();
    
                $targetPath = WWW_ROOT . 'img' . DS . $name;
    
                if($name)
                $image->moveTo($targetPath);
    
                $info->image = $name;   
            }


            if ($this->Info->save($info)) {
                $this->Flash->success(__('The info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The info could not be saved. Please, try again.'));
        }
        $this->set(compact('info'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Info id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $info = $this->Info->get($id);
        
        echo $info;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $info = $this->Info->patchEntity($info, $this->request->getData());

            if (!$info->getErrors) {

                $image = $this->request->getData('change_image');

                $name = $image->getClientFilename();

                if ($name)
                    $targetPath = WWW_ROOT . 'img' . DS . $name;

                $image->moveTo($targetPath);

                $info->image =$name;
                echo $info;
            }

            if ($this->Info->save($info)) {
                $this->Flash->success(__('The info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The info could not be saved. Please, try again.'));
        }
        $this->set(compact('info'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Info id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $info = $this->Info->get($id);
        if ($this->Info->delete($info)) {
            $this->Flash->success(__('The info has been deleted.'));
        } else {
            $this->Flash->error(__('The info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    function products()
    {
        
    }



    // public function login()
    // {
    //     if ($this->request->is('post')) {
    //         $info = $this->Auth->identify();
    //         if ($info) {
    //             $this->Auth->setUser($info);
    //             return $this->redirect(['controller' => 'info', 'action' => 'index']);
    //         } else {
    //             $this->Flash->error('not login ');
    //         }
    //     }

    // }
  
        public function login()
        {
            $info = $this->Info->newEmptyEntity();
            if ($this->request->is('post')) {
                 $email = $this->request->getData('email');
                 $password =  $this->request->getData('password');
            
                 $result = $this->Info->login($email, $password);
                if ($result) {
                    $session = $this->getRequest()->getSession(); //get session
                    $session->write('email', $email); //write name value to session
                    $this->Flash->success(__('The user has been logged in successfully.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Please enter valid email and password'));
            }
            $this->set(compact('info'));
        }

        public function logout()
    {
        $session = $this->request->getSession(); //read session data
        // $this->$session->delete();
        $session->destroy();
        return $this->redirect(['action' => 'login']);
    }
 }

    
    


