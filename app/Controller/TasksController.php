<?php

class TasksController extends AppController
{
    // public $scaffold;

    public $helpers = array('Html', 'Form');

    public $components = array('Flash');

    public function index()
    {
        $options = array('conditions' => array('Task.status' => 0));

        $tasks = $this->Task->find('all', $options);

        $this->set('tasks', $tasks);
    }

    public function done($id)
    {
        //URLの末尾からタスクのIDを取得してデータを更新
        $this->Task->id = $id;
        $this->Task->saveField('status', 1);

        $msg = sprintf('タスク %s を完了しました', $id);

        //フラッシュメッセージ
        $this->Flash->success($msg);

        return $this->redirect(array('action' => 'index'));
    }

    public function create()
    {
        if ($this->request->is('post'))
        {
            $this->Task->save($this->request->data);
            $msg = sprintf('タスク $s を作成しました', $this->Task->id);

            $this->Flash->success($msg);
            $this->redirect(array('action' => 'index'));
        }
    }

}