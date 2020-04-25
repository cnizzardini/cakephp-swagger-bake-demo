<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountriesTable Test Case
 */
class CountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CountriesTable
     */
    protected $Countries;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Countries',
        'app.Cities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Countries') ? [] : ['className' => CountriesTable::class];
        $this->Countries = TableRegistry::getTableLocator()->get('Countries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Countries);

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
}
