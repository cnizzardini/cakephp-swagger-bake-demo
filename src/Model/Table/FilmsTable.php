<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Films Model
 *
 * @property \App\Model\Table\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \App\Model\Table\FilmActorsTable&\Cake\ORM\Association\HasMany $FilmActors
 * @property \App\Model\Table\FilmCategoriesTable&\Cake\ORM\Association\HasMany $FilmCategories
 * @property \App\Model\Table\FilmTextsTable&\Cake\ORM\Association\HasMany $FilmTexts
 * @property \App\Model\Table\InventoriesTable&\Cake\ORM\Association\HasMany $Inventories
 *
 * @method \App\Model\Entity\Film newEmptyEntity()
 * @method \App\Model\Entity\Film newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Film[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Film get($primaryKey, $options = [])
 * @method \App\Model\Entity\Film findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Film patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Film[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Film|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FilmsTable extends Table
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

        $this->setTable('films');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');

        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FilmActors', [
            'foreignKey' => 'film_id',
        ]);
        $this->hasMany('FilmCategories', [
            'foreignKey' => 'film_id',
        ]);
        $this->hasMany('FilmTexts', [
            'foreignKey' => 'film_id',
        ]);
        $this->hasMany('Inventories', [
            'foreignKey' => 'film_id',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('release_year')
            ->maxLength('release_year', 255)
            ->allowEmptyString('release_year');

        $validator
            ->nonNegativeInteger('rental_duration')
            ->notEmptyString('rental_duration');

        $validator
            ->decimal('rental_rate')
            ->notEmptyString('rental_rate');

        $validator
            ->nonNegativeInteger('length')
            ->allowEmptyString('length');

        $validator
            ->decimal('replacement_cost')
            ->notEmptyString('replacement_cost');

        $validator
            ->scalar('rating')
            ->maxLength('rating', 255)
            ->allowEmptyString('rating');

        $validator
            ->scalar('special_features')
            ->maxLength('special_features', 255)
            ->allowEmptyString('special_features');

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
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }
}
