<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Film Categories') ?></h4>
                <?php if (!empty($category->film_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Uuid') ?></th>
                            <th><?= __('Film Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->film_categories as $filmCategories) : ?>
                        <tr>
                            <td><?= h($filmCategories->uuid) ?></td>
                            <td><?= h($filmCategories->film_id) ?></td>
                            <td><?= h($filmCategories->category_id) ?></td>
                            <td><?= h($filmCategories->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FilmCategories', 'action' => 'view', $filmCategories->uuid]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FilmCategories', 'action' => 'edit', $filmCategories->uuid]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FilmCategories', 'action' => 'delete', $filmCategories->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmCategories->uuid)]) ?>
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
