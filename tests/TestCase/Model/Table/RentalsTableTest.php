<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RentalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RentalsTable Test Case
 */
class RentalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RentalsTable
     */
    protected $Rentals;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Rentals',
        'app.Inventories',
        'app.Customers',
        'app.Employees',
        'app.Payments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rentals') ? [] : ['className' => RentalsTable::class];
        $this->Rentals = TableRegistry::getTableLocator()->get('Rentals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rentals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
