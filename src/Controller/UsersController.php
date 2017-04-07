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
		echo "Agregar Usuario";
		exit();
	}
}
