<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilmTexts Model
 *
 * @property \App\Model\Table\FilmsTable&\Cake\ORM\Association\BelongsTo $Films
 *
 * @method \App\Model\Entity\FilmText newEmptyEntity()
 * @method \App\Model\Entity\FilmText newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FilmText[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FilmText get($primaryKey, $options = [])
 * @method \App\Model\Entity\FilmText findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FilmText patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FilmText[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FilmText|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilmText saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilmText[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilmText[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilmText[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilmText[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FilmTextsTable extends Table
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

        $this->setTable('film_texts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('uuid');

        $this->belongsTo('Films', [
            'foreignKey' => 'film_id',
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

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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

        return $rules;
    }
}
