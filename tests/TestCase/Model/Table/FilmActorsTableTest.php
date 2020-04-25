<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmActorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmActorsTable Test Case
 */
class FilmActorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmActorsTable
     */
    protected $FilmActors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FilmActors',
        'app.Actors',
        'app.Films',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FilmActors') ? [] : ['className' => FilmActorsTable::class];
        $this->FilmActors = TableRegistry::getTableLocator()->get('FilmActors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FilmActors);

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
