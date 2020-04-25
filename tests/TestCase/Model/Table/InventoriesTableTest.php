<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoriesTable Test Case
 */
class InventoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InventoriesTable
     */
    protected $Inventories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Inventories',
        'app.Films',
        'app.Stores',
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
        $config = TableRegistry::getTableLocator()->exists('Inventories') ? [] : ['className' => InventoriesTable::class];
        $this->Inventories = TableRegistry::getTableLocator()->get('Inventories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Inventories);

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
