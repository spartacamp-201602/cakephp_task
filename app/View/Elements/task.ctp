<!-- CSSの読み込み -->
<?php echo $this->Html->css('task'); ?>

<div class="roundBox">
<table>
    <tr>
        <th>Id</th>
        <th>名前</th>
        <th>期限日</th>
        <th>作成日</th>
        <th>操作</th>
    </tr>
        <tr>
            <td><?php echo $this->Html->link($task['Task']['id'], '/tasks/view'.$task['Task']['id']); ?></td>
            <td><?php echo $task['Task']['name']; ?>
            <p><strong>コメント一覧</strong></p>
            <?php foreach ($task['Note'] as $note) : ?>
                <li>
                    <ul><?php echo $note['body']; ?></ul>
                </li>
            <?php endforeach; ?>
            <br>
            <?php echo $this->Html->link('コメント追加', array('controller' => 'notes', 'action' => 'add')); ?>
            <!-- <?php echo $this->Html->link('コメント追加', '/notes/add/') ; ?> -->

            </td>
            <td><?php echo $task['Task']['due_date']; ?></td>
            <td><?php echo $task['Task']['created']; ?></td>
            <td><?php echo $this->Html->link('このタスクを完了する', '/Tasks/done/'.$task['Task']['id']); ?>
                <br><?php echo $this->Html->link('タスク編集',  '/tasks/edit/'.$task['Task']['id']); ?>
            </td>
        </tr>
</table>
</div>
