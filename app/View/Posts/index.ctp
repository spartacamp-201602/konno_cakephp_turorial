<h2>Blog Posts</h2>

<!-- <?php debug($posts) ?> -->

<table>
    <tr>
        <th>Id</th>
        <th>タイトル</th>
        <th>本文</th>
        <th>投稿日</th>
    </tr>

    <?php foreach($posts as $post): ?>
        <tr>
            <td><?php echo h($post['Post']['id']) ?></td>

            <td><?php echo $this->Html->link(
                $post['Post']['title'],
                array('controller' => 'posts', 'action' => 'show', $post['Post']['id']
                    )); ?></td>

            <td><?php echo h($post['Post']['body']) ?></td>
            <td><?php echo h($post['Post']['created']) ?></td>
        </tr>
    <?php endforeach ?>
</table>