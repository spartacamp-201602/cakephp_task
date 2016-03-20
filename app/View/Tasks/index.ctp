<?php echo $this->Html->link('新規タスク', '/tasks/create'); ?>

<h2>未完了タスク一覧</h2>

<!-- <?php echo debug($tasks); ?> -->

<h3><?php echo count($tasks); ?>件のタスクが未完了です</h3>

<?php foreach ($tasks as $task) : ?>
    <!-- 第一引数にファイル名、第二引数に渡したい変数を指定する -->
<?php echo $this->element('task', array('task' => $task)); ?>
<?php endforeach; ?>