<?php

class TasksController extends AppController
{
    // public $scaffold;

    public $helpers = array('Html', 'Form');

    public $conmponents = array('Flash');

    public function index()
    {
        $options = array(
            //未完了タスクだけ表示 => statusが0のコード
            'conditions' => array(
                'Task.status' => 0
                )
            );

        $tasks = $this->Task->find('all', $options);
        // $this->set('tasks', $this->Task->find('all', $options));
        $this->set('tasks', $tasks);
        // sql = select * from tasks where status = 0;
    }

    public function create()
    {

    }

    public function done($id)
    {
        if ($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if ($thi->Post->done($id))
        {
            $this->Flash->success('タスク'.$id.'を完了しました');
            //リダイレクト
            return $this->redirect(array('action' => 'index'));
        }
    }

}