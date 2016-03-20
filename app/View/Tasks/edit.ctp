<h2>タスク編集</h2>

<?php
echo $this->Form->create('Task');
echo $this->Form->input('name', array('label' => 'タスク名'));
echo $this->Form->input('due_date',array('label' => '期限'));
echo $this->Form->input('body', array('label' => '詳細'));
echo $this->Form->end('保存');

?>