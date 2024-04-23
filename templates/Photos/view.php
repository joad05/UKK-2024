<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
?>

<?php
$this->assign('title', __('Photo'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Photos'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($photo->title) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $photo->has('user') ? $this->Html->link($photo->user->name, ['controller' => 'Users', 'action' => 'view', $photo->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Title') ?></th>
                <td><?= h($photo->title) ?></td>
            </tr>
            <tr>
                <th><?= __('Album') ?></th>
                <td><?= $photo->has('album') ? $this->Html->link($photo->album->name, ['controller' => 'Albums', 'action' => 'view', $photo->album->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($photo->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Date Upload') ?></th>
                <td><?= h($photo->date_upload) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $photo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $photo->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Photo') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($photo->photo)); ?>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Description') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($photo->description)); ?>
    </div>
</div>

<div class="related related-comment view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Comments') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add', '?' => ['photo_id' => $photo->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Photo Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($photo->comments)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Comments record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($photo->comments as $comment) : ?>
                    <tr>
                        <td><?= h($comment->id) ?></td>
                        <td><?= h($comment->user_id) ?></td>
                        <td><?= h($comment->date) ?></td>
                        <td><?= h($comment->content) ?></td>
                        <td><?= h($comment->photo_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comment->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comment->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comment->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-like view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Likes') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add', '?' => ['photo_id' => $photo->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Photo Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($photo->likes)) : ?>
                <tr>
                    <td colspan="5" class="text-muted">
                        <?= __('Likes record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($photo->likes as $like) : ?>
                    <tr>
                        <td><?= h($like->id) ?></td>
                        <td><?= h($like->user_id) ?></td>
                        <td><?= h($like->date) ?></td>
                        <td><?= h($like->photo_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $like->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $like->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $like->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $like->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
