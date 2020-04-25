<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmsTable Test Case
 */
class FilmsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmsTable
     */
    protected $Films;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Films',
        'app.Languages',
        'app.OriginalLanguages',
        'app.FilmActors',
        'app.FilmCategories',
        'app.FilmTexts',
        'app.Inventories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Films') ? [] : ['className' => FilmsTable::class];
        $this->Films = TableRegistry::getTableLocator()->get('Films', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Films);

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
