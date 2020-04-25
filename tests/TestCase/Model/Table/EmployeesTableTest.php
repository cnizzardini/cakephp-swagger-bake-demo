<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeesTable Test Case
 */
class EmployeesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeesTable
     */
    protected $Employees;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Employees',
        'app.Addresses',
        'app.Stores',
        'app.Payments',
        'app.Rentals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Employees') ? [] : ['className' => EmployeesTable::class];
        $this->Employees = TableRegistry::getTableLocator()->get('Employees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Employees);

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
