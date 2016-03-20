<?php echo $this->Html->link('新規タスク', '/tasks/create'); ?>
<br>
<?php echo $this->Html->link('新規ノート', '/notes/'); ?>

<h2>未完了タスク一覧</h2>

<?php echo debug($tasks); ?>

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
            <td><?php echo $this->Html->link('このタスクを完了する', '/Tasks/done/'.$task['Task']['id']); ?></td>
            <?php foreach ($task['Note'] as $note) : ?>
                <li>
                    <ul><?php echo $note['body']; ?></ul>
                </li>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
