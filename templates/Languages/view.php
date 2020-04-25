<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Languages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Language'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="languages view content">
            <h3><?= h($language->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($language->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($language->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Films') ?></h4>
                <?php if (!empty($language->films)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Release Year') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('Original Language Id') ?></th>
                            <th><?= __('Rental Duration') ?></th>
                            <th><?= __('Rental Rate') ?></th>
                            <th><?= __('Length') ?></th>
                            <th><?= __('Replacement Cost') ?></th>
                            <th><?= __('Rating') ?></th>
                            <th><?= __('Special Features') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($language->films as $films) : ?>
                        <tr>
                            <td><?= h($films->id) ?></td>
                            <td><?= h($films->title) ?></td>
                            <td><?= h($films->description) ?></td>
                            <td><?= h($films->release_year) ?></td>
                            <td><?= h($films->language_id) ?></td>
                            <td><?= h($films->original_language_id) ?></td>
                            <td><?= h($films->rental_duration) ?></td>
                            <td><?= h($films->rental_rate) ?></td>
                            <td><?= h($films->length) ?></td>
                            <td><?= h($films->replacement_cost) ?></td>
                            <td><?= h($films->rating) ?></td>
                            <td><?= h($films->special_features) ?></td>
                            <td><?= h($films->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Films', 'action' => 'view', $films->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Films', 'action' => 'edit', $films->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Films', 'action' => 'delete', $films->id], ['confirm' => __('Are you sure you want to delete # {0}?', $films->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
