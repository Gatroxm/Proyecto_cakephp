<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController
{


    public function isAuthorized($user)
    {
        if (isset($user['role']) and $user['role'] === 'user') 
        {
            if (in_array($this->request->action, ['add', 'index', 'edit', 'delete']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['user_id' => $this->Auth->user('id')],'order' => ['id' => 'desc']
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) 
        {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');
            if ($this->Bookmarks->save($bookmark)) 
            {
                $this->Flash->success('El enlace ha sido creado');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('EL Enlace no se pudo crear');
        }
        $this->set(compact('bookmark'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');
            if ($this->Bookmarks->save($bookmark))
            {
                $this->Flash->success('EL enlace ha sido editado correcta mente');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('EL enlace no ha sido editado correcta mente, intentelo de nuevo');
        }
        $this->set(compact('bookmark'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        $namebookmark = $bookmark->title;
        if ($this->Bookmarks->delete($bookmark))
        {
            $this->Flash->success('El enlace ' . $namebookmark . ' ha sido eliminado correcta mente');
        }
        else
        {
            $this->Flash->error('El enlace ' . $namebookmark . ' no ha sido eliminado correcta mente');
        }

        return $this->redirect(['action' => 'index']);
    }
}
