<?php

class TasksController extends AppController
{
    // public $scaffold;

    public $helpers = array('Html', 'Form');

    public $components = array('Flash');

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
        $this->Task->id = $id;
        //saveFieldは単一のレコードのカラムを更新
        $this->Task->saveField('status', 1);

        $msg = sprintf('タスク %s を完了しました', $id);

        $this->Flash->success($msg);

        return $this->redirect(array('action' => 'index'));
    }

}