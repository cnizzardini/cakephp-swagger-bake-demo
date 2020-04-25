<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film'), ['action' => 'edit', $film->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films view content">
            <h3><?= h($film->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($film->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Release Year') ?></th>
                    <td><?= h($film->release_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language') ?></th>
                    <td><?= $film->has('language') ? $this->Html->link($film->language->name, ['controller' => 'Languages', 'action' => 'view', $film->language->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= h($film->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Special Features') ?></th>
                    <td><?= h($film->special_features) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($film->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Original Language Id') ?></th>
                    <td><?= $this->Number->format($film->original_language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rental Duration') ?></th>
                    <td><?= $this->Number->format($film->rental_duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rental Rate') ?></th>
                    <td><?= $this->Number->format($film->rental_rate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Length') ?></th>
                    <td><?= $this->Number->format($film->length) ?></td>
                </tr>
                <tr>
                    <th><?= __('Replacement Cost') ?></th>
                    <td><?= $this->Number->format($film->replacement_cost) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($film->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($film->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Film Actors') ?></h4>
                <?php if (!empty($film->film_actors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Uuid') ?></th>
                            <th><?= __('Actor Id') ?></th>
                            <th><?= __('Film Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($film->film_actors as $filmActors) : ?>
                        <tr>
                            <td><?= h($filmActors->uuid) ?></td>
                            <td><?= h($filmActors->actor_id) ?></td>
                            <td><?= h($filmActors->film_id) ?></td>
                            <td><?= h($filmActors->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FilmActors', 'action' => 'view', $filmActors->uuid]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FilmActors', 'action' => 'edit', $filmActors->uuid]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FilmActors', 'action' => 'delete', $filmActors->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmActors->uuid)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Film Categories') ?></h4>
                <?php if (!empty($film->film_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Uuid') ?></th>
                            <th><?= __('Film Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($film->film_categories as $filmCategories) : ?>
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
            <div class="related">
                <h4><?= __('Related Film Texts') ?></h4>
                <?php if (!empty($film->film_texts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Uuid') ?></th>
                            <th><?= __('Film Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($film->film_texts as $filmTexts) : ?>
                        <tr>
                            <td><?= h($filmTexts->uuid) ?></td>
                            <td><?= h($filmTexts->film_id) ?></td>
                            <td><?= h($filmTexts->title) ?></td>
                            <td><?= h($filmTexts->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FilmTexts', 'action' => 'view', $filmTexts->uuid]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FilmTexts', 'action' => 'edit', $filmTexts->uuid]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FilmTexts', 'action' => 'delete', $filmTexts->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmTexts->uuid)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Inventories') ?></h4>
                <?php if (!empty($film->inventories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Film Id') ?></th>
                            <th><?= __('Store Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($film->inventories as $inventories) : ?>
                        <tr>
                            <td><?= h($inventories->id) ?></td>
                            <td><?= h($inventories->film_id) ?></td>
                            <td><?= h($inventories->store_id) ?></td>
                            <td><?= h($inventories->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Inventories', 'action' => 'view', $inventories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Inventories', 'action' => 'edit', $inventories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inventories', 'action' => 'delete', $inventories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventories->id)]) ?>
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
