<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>

<?php
$this->assign('title', __('Comment'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Comments'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($comment->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $comment->has('user') ? $this->Html->link($comment->user->name, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Photo') ?></th>
                <td><?= $comment->has('photo') ? $this->Html->link($comment->photo->title, ['controller' => 'Photos', 'action' => 'view', $comment->photo->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($comment->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Date') ?></th>
                <td><?= h($comment->date) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comment->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Content') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($comment->content)); ?>
    </div>
</div>
