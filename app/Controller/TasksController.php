<?php

class TasksController extends AppController
{
    // public $scaffold;

    public $helpers = array('Html', 'Form');
    //意味は一緒
    // public $helpers = ['Html', 'Form'];

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
            if ($this->Task->save($this->request->data))
            {
            $msg = sprintf('タスク $s を作成しました', $this->Task->id);

            $this->Flash->success($msg);
            $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Flash->error('保存できませんでした');
            }
        }
    }

    public function edit($id)
    {
        // $options = array(
        //     'conditions' => array(
        //         'Task.id' => $id,
        //         'Task.status' => 0
        //         )
        //     );

        //指定されたタスクのデータ取得
        // $task = $this->Task->find('first', $options);
        $task = $this->Task->findById($id);
        // sql: select * from tasks where id = $id

        // debug($task);

        //データが見つからない場合はリダイレクト
        //レコードが見つかったか判定
        if (!$task)
        {
            $this->Flash->error('タスクが見つかりません');
            $this->redirect(array('action' => 'index'));
        }

        //フォームから送信された場合には更新処理を行う
        if ($this->request->is(array('post', 'put')))
        {
            //これがないと新しいタスクになってしまう
            //更新されない
            $this->Task->id = $id;

            if ($this->Task->save($this->request->data))
            {
                $this->Flash->success('更新しました');
                return $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Flash->error('更新できませんでした');
            }
        }
        else
        {
            //あらかじめフォームに値をセットする
            //GETメソッドできたら URL直打ちできたら
            // debug($this->request->data);
            $this->request->data = $task;
            // debug($this->request->data);
            // exit;
        }
    }

}