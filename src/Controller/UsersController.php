<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
//tavoxpau@outlook.com
	//palma18
	public function login()
	{
		if($this->request->is('post'))
		{
			$user = $this->Auth->identify();
			if ($user)
			{
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Flash->error('Datos invalidos, por favor intente nueva mente',['key' => 'auth']);
			}
		}
	}
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
	public function home()
	{
		$this->render();
	}
	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set('users', $users);
	}
	public function view($name)
	{
		echo "Detalle de Usuarios ". $name;
		exit();
	}
	public function add()
	{
		$user = $this->Users->newEntity();
		if($this->request->is('post'))
		{
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user))
			{
				$this->Flash->success("Se ha creado el Usuario Correctamente");
				return $this->redirect(['controller' => 'Users', 'action' => 'index']);
			}
			else
			{
				$this->Flash->error("no se ha creado el Usuario Correctamente");
			}
		}
		$this->set(compact('user'));
	}
}
