<h2>未完了タスク一覧</h2>

<!-- /Tasks/createへのリンクを作る -->
<?php echo $this->Html->Link('新規タスク', '/tasks/create'); ?>
<!-- <?php echo $this->Html->Link('新規タスク', array('controller' => 'tasks', 'action' => 'create')); ?> -->

<h3><?php echo count($tasks); ?>件のタスクが未完了です</h3>

<!-- <?php debug($tasks); ?> -->
<table>
    <tr>
        <th>ID</th>
        <th>タスク名</th>
        <th>期限</th>
        <th>作成日</th>
        <th>操作</th>
    </tr>
    <?php foreach ($tasks as $task) : ?>
    <tr>
        <td><?php echo $this->Html->link($task['Task']['id'], 'tasks/view/'.$task['Task']['id']); ?></td>
        <td><?php echo $task['Task']['name']; ?></td>
        <td><?php echo $task['Task']['body']; ?></td>
        <td><?php echo $task['Task']['due_date']; ?></td>
        <td><?php echo $this->Html->link('このタスクを完了する', '/tasks/done/' . $task['Task']['id']); ?></td>
    </tr>
<?php endforeach; ?>
</table>