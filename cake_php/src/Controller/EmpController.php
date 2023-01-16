<?php
declare(strict_types=1);

namespace App\Controller;

// use Cake\Mailer\Email;
// use Cake\Mailer\Mailer;
// use Cake\Mailer\TransportFactory;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

/**
 * Emp Controller
 *
 * @property \App\Model\Table\EmpTable $Emp
 * @method \App\Model\Entity\Emp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $emp = $this->paginate($this->Emp);

        $this->set(compact('emp'));
    }

    /**
     * View method
     *
     * @param string|null $id Emp id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emp = $this->Emp->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('emp'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emp = $this->Emp->newEmptyEntity();
        if ($this->request->is('post')) {

            // patchentity assign value to properties of object

            $emp = $this->Emp->patchEntity($emp, $this->request->getData());

        //    $emp->token = Security::hash(Security::randomBytes(32));

            // without patcEntity insert data
            // $emp->name = $this->request->getData('name');
            // $emp->address = $this->request->getData('address');
            // $emp->city = $this->request->getData('city');
            // $emp->pincode = $this->request->getData('pincode');
            // $emp->country = $this->request->getData('country');

            if ($this->Emp->save($emp)) {
                $this->Flash->success(__('The emp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emp could not be saved. Please, try again.'));
        }
        $this->set(compact('emp'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Emp id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emp = $this->Emp->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emp = $this->Emp->patchEntity($emp, $this->request->getData());
            // without patcEntity insert data
            // $emp->name = $this->request->getData('name');
            // $emp->address = $this->request->getData('address');
            // $emp->city = $this->request->getData('city');
            // $emp->pincode = $this->request->getData('pincode');
            // $emp->country = $this->request->getData('country');

            if ($this->Emp->save($emp)) {
                $this->Flash->success(__('The emp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emp could not be saved. Please, try again.'));
        }
        $this->set(compact('emp'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Emp id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emp = $this->Emp->get($id);
        if ($this->Emp->delete($emp)) {
            $this->Flash->success(__('The emp has been deleted.'));
        } else {
            $this->Flash->error(__('The emp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function myadd()
    {
        // $name = $this->request->getData('name');
        $email = $this->request->getData('email');

        $emp = $this->Emp->newEmptyEntity();

        if($this->request->is('post')){
                    $mailer = new Mailer('default');
                    $mailer->setTransport('gmail'); //your email configuration name

                    $mailer->setFrom(['hk244381@gmail.com' => 'harsh kumar send the mail']);
                    $mailer->setTo($email);
                    $mailer->setEmailFormat('html');
                    $mailer->setSubject('Verify New Account');
                    $mailer->deliver('welcome to my mail');

                    $this->Flash->success(__('mail send successfully.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->set(compact('emp'));
            }

    // public function forgot()
    // {
    //     if ($this->request->is('post')) {

    //         $email = $this->request->getData('email');

    //         $token = Security::hash(Security::randomBytes(25));

    //         $EmpTable = TableRegistry::get('Emp');
    //         if ($email == NULL) {
    //             $this->Flash->error(__('Please insert your email address'));
    //         }
    //         if ($user = $EmpTable->find('all')->where(['email' => $email])->first()) {

    //             if ($EmpTable->save($user)) {

    //                 $mailer = new Mailer('default');
    //                 $mailer->setTransport('gmail');
    //                 $mailer->setFrom(['hk244381@gmail.com' => 'myCake4'])
    //                     ->setTo($email)
    //                     ->setEmailFormat('html')
    //                     ->setSubject('Forgot Password Request')
    //                     ->deliver('Hello<br/>Please click link below to reset your password<br/><br/><a href="http://localhost:8765/emp/reset/?token=' . $token . '">Reset Password</a>');
    //             }
    //             $this->Flash->success('Reset password link has been sent to your email (' . $email . '), please check your email');
    //         }
    //         if ($total = $EmpTable->find('all')->where(['email' => $email])->count() == 0) {
    //             $this->Flash->error(__('Email is not registered in system'));
    //         }

    //     }
    // }
    // public function reset()
    // {
    //     $token=$_GET['token'];
    //     if ($this->request->is('post')) {
     
    //         $hasher = new DefaultPasswordHasher();
            
    //         $newPass = $hasher->hash($this->request->getData('password'));
            
    //         $EmpTable = TableRegistry::get('Emp');
            
    //         $user = $EmpTable->find('all')->where(['token' => $token])->first();

    //         $user->password = $newPass;

    //         if ($EmpTable->save($user)) {
    //             $this->Flash->success('Password successfully reset. Please login using your new password');
    //             return $this->redirect(['action' => 'index']);
    //         }
    //     }
    // }

}





// public $paginate = [
//     'limit' => 2,
//     ];
