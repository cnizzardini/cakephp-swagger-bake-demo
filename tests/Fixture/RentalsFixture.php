<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RentalsFixture
 */
class RentalsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'rental_date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'inventory_id' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'return_date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'employee_id' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'inventory_id' => ['type' => 'index', 'columns' => ['inventory_id'], 'length' => []],
            'customer_id' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
            'employee_id' => ['type' => 'index', 'columns' => ['employee_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'rental_date' => ['type' => 'unique', 'columns' => ['rental_date', 'inventory_id', 'customer_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'rental_date' => '2020-04-24 20:59:24',
                'inventory_id' => 1,
                'customer_id' => 1,
                'return_date' => '2020-04-24 20:59:24',
                'employee_id' => 1,
                'modified' => '2020-04-24 20:59:24',
            ],
        ];
        parent::init();
    }
}
