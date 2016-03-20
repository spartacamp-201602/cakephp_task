<?php echo $this->Html->link('新規タスク', '/tasks/create'); ?>

<h3><?php echo count($tasks); ?>件のタスクが未完了です</h3>

<table>
    <tr>
        <th>Id</th>
        <th>名前</th>
        <th>期限日</th>
        <th>作成日</th>
        <th>操作</th>
    </tr>
    <?php foreach ($tasks as $task) : ?>
        <tr>
            <td><?php echo $this->Html->link($task['Task']['id'], 'Tasks/view'.$task['Task']['id']); ?></td>
            <td><?php echo $task['Task']['name']; ?></td>
            <td><?php echo $task['Task']['due_date']; ?></td>
            <td><?php echo $task['Task']['created']; ?></td>
            <td><?php echo $this->Html->link('このタスクを完了する', '/Tasks/done/'.$task['Task']['id']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
