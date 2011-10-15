<?php
class PostsController extends AppController
{
    public $name = 'Posts';
    public $helpers = array ('Html','Form');
    public $components = array('Session');

    public function index()
    {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null)
    {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }

    public function add()
    {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id)
    {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->read();
        } else {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('You post has been updated.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id)
    {
        if ($this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }
}
