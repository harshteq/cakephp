<?php
namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use DateTime;

class FormController extends AppController{

    function myform(){
        $connection = ConnectionManager::get('default');
        
        $results = $connection->execute('SELECT * FROM emp')->fetchAll('assoc');
        $this->set(compact('results'));
    }   

    function insert(){
        $connection = ConnectionManager::get('default');

        if ($this->request->is('post')) {
            $name=$this->request->getdata('name');
            $address=$this->request->getdata('address');
            $city=$this->request->getdata('city');
            $pincode=$this->request->getdata('pincode');
            $country=$this->request->getdata('country');

            $sql = $connection->execute("INSERT INTO emp( name, address, city, pincode, country) 
            VALUES ('$name','$address','$city','$pincode','$country')");
            
            if($sql){
                $this->Flash->success(__('The emp has been saved.'));

                return $this->redirect(['action' => 'myform']);
            }
    }
} 
function update($id){
 
    $connection = ConnectionManager::get('default');
    $results = $connection->execute("SELECT * FROM emp where id='$id'")->fetchAll('assoc');

    $this->set(compact('results'));


    
    if ($this->request->is('post')) {
        $name=$this->request->getdata('name');
        $address=$this->request->getdata('address');
        $city=$this->request->getdata('city');
        $pincode=$this->request->getdata('pincode');
        $country=$this->request->getdata('country');
        
        $sql = $connection->execute("UPDATE emp SET name='$name',address='$address',
        city='$city',pincode='$pincode',country='$country' WHERE id='$id'");
        
        if ($sql){
            $this->Flash->success(__('The emp has been saved.'));

            return $this->redirect(['action' => 'myform']);
        }
        $this->Flash->error(__('The emp could not be saved. Please, try again.'));
    }
}

function delete($id){
    $connection = ConnectionManager::get('default');
        
    $results = $connection->execute("DELETE FROM emp WHERE id=$id");
    if($results){
            $this->Flash->success(__('The emp has been deleted.'));
        } else {
            $this->Flash->error(__('The emp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'myform']);
    }

}


?>