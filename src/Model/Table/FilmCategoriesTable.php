<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilmCategories Model
 *
 * @property \App\Model\Table\FilmsTable&\Cake\ORM\Association\BelongsTo $Films
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\FilmCategory newEmptyEntity()
 * @method \App\Model\Entity\FilmCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FilmCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FilmCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\FilmCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FilmCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FilmCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FilmCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilmCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilmCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilmCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilmCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilmCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FilmCategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('film_categories');
        $this->setDisplayField('uuid');
        $this->setPrimaryKey('uuid');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Films', [
            'foreignKey' => 'film_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('uuid')
            ->allowEmptyString('uuid', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['film_id'], 'Films'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
