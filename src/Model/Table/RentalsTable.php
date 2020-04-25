<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rentals Model
 *
 * @property \App\Model\Table\InventoriesTable&\Cake\ORM\Association\BelongsTo $Inventories
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Rental newEmptyEntity()
 * @method \App\Model\Entity\Rental newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rental[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rental get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rental findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rental patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rental[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rental|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rental saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rental[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rental[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rental[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rental[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RentalsTable extends Table
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

        $this->setTable('rentals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Inventories', [
            'foreignKey' => 'inventory_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'rental_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('rental_date')
            ->requirePresence('rental_date', 'create')
            ->notEmptyDateTime('rental_date');

        $validator
            ->dateTime('return_date')
            ->allowEmptyDateTime('return_date');

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
        $rules->add($rules->existsIn(['inventory_id'], 'Inventories'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
