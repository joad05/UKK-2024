<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
$this->assign('title', __('User'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Users'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($user->name) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($user->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Address') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
</div>

<div class="related related-album view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Albums') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Date Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->albums)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Albums record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->albums as $album) : ?>
                    <tr>
                        <td><?= h($album->id) ?></td>
                        <td><?= h($album->user_id) ?></td>
                        <td><?= h($album->name) ?></td>
                        <td><?= h($album->description) ?></td>
                        <td><?= h($album->date_created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Albums', 'action' => 'view', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Albums', 'action' => 'edit', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Albums', 'action' => 'delete', $album->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-comment view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Comments') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($user->comments)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Comments record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->comments as $comment) : ?>
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
            <?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($user->likes)) : ?>
                <tr>
                    <td colspan="5" class="text-muted">
                        <?= __('Likes record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->likes as $like) : ?>
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

<div class="related related-photo view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Photos') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Date Upload') ?></th>
                <th><?= __('Album Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->photos)) : ?>
                <tr>
                    <td colspan="8" class="text-muted">
                        <?= __('Photos record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->photos as $photo) : ?>
                    <tr>
                        <td><?= h($photo->id) ?></td>
                        <td><?= h($photo->user_id) ?></td>
                        <td><?= h($photo->title) ?></td>
                        <td><?= h($photo->photo) ?></td>
                        <td><?= h($photo->description) ?></td>
                        <td><?= h($photo->date_upload) ?></td>
                        <td><?= h($photo->album_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Photos', 'action' => 'view', $photo->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Photos', 'action' => 'edit', $photo->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Photos', 'action' => 'delete', $photo->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
