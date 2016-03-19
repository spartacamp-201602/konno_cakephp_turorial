<h2>Blog Posts</h2>

<!-- <?php debug($posts) ?> -->

<table>
    <tr>
        <th>Id</th>
        <th>タイトル</th>
        <th>操作</th>
        <th>投稿日</th>
    </tr>

    <?php foreach ($posts as $post) : ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td><?php echo $this->Html->link(
                $post['Post']['title'],
                array('controller' => 'posts', 'action' => 'show', $post['Post']['id']
            )); ?></td>
        <td>
            <?php echo $this->html->link(
                    '編集',
                    array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']
                )); ?>
            <?php echo $this->Form->postLink(
                    '削除',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => '削除してよろしいですか?')
                ); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>