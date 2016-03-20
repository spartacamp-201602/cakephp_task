<h2>新規タスク追加</h2>

<?php
echo $this->Form->create('Task');
echo $this->Form->input('name', array('label' => 'タスク名'));
echo $this->Form->input('due_date');
echo $this->Form->input('body', array('label' => '詳細'));
echo $this->Form->end('追加');

?>