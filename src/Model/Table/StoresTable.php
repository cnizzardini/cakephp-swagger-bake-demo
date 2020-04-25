<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stores Model
 *
 * @property \App\Model\Table\ManagerEmployeesTable&\Cake\ORM\Association\BelongsTo $ManagerEmployees
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\HasMany $Customers
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 * @property \App\Model\Table\InventoriesTable&\Cake\ORM\Association\HasMany $Inventories
 *
 * @method \App\Model\Entity\Store newEmptyEntity()
 * @method \App\Model\Entity\Store newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Store[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Store get($primaryKey, $options = [])
 * @method \App\Model\Entity\Store findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Store patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Store[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Store|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Store saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoresTable extends Table
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

        $this->setTable('stores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ManagerEmployees', [
            'foreignKey' => 'manager_employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Customers', [
            'foreignKey' => 'store_id',
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'store_id',
        ]);
        $this->hasMany('Inventories', [
            'foreignKey' => 'store_id',
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
        $rules->add($rules->existsIn(['manager_employee_id'], 'ManagerEmployees'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }
}
