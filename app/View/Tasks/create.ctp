<h2>新規タスク登録</h2>

<?php
//フォーム設置
echo $this->Form->create('Task');
echo $this->Form->input('name');
echo $this->Form->input('body');
echo $this->Form->input('due_date');

echo $this->Form->end('タスク登録');

?>