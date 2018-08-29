<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
	function index()
	{
		$users = TableRegistry::get('users');
		$query = $users->find();
		$this->set('results',$query);
	}
	function add()
	{
		if($this->request->is('post'))
		{
			$username = $this->request->data('username');

			$hashobj =  new DefaultPasswordHasher;

			$password =$hashobj->hash($this->request->data('password'));

			$users_table = TableRegistry::get('users');
			$users = $users_table->newEntity();
			$users->username = $username;
			$users->password = $password;

			if($users_table->save($users))
			{
				echo "user is added";
				$this->setAction('index');
			}
		}
	}
	function edit($id)
	{
		//die;
		if($this->request->is('post'))
		{
			//die;
			$username = $this->request->data('username');
			$password = $this->request->data('password');
			$users_table = TableRegistry::get('users');
			$users  = $users_table->get($id);
			//pr($users); die;
			$users->username = $username;
			$users->password = $password;
			if($users_table->save($users))
			{
				echo "User is updated";
				
			}
			$this->setAction('index');
		}
		else {
            $users_table = TableRegistry::get('users')->find();
            $users = $users_table->where(['id'=>$id])->first();
            //pr($users); die;
            $this->set('username',$users->username);
            $this->set('password',$users->password);
            $this->set('id',$id);
		}
	}

	public function delete($id){
         $users_table = TableRegistry::get('users');
         $users = $users_table->get($id);
         $users_table->delete($users);
         echo "User deleted successfully.";
         $this->setAction('index');
      }
}
