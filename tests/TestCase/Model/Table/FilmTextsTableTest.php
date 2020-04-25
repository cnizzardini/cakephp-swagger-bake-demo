<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmTextsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmTextsTable Test Case
 */
class FilmTextsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmTextsTable
     */
    protected $FilmTexts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FilmTexts',
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
        $config = TableRegistry::getTableLocator()->exists('FilmTexts') ? [] : ['className' => FilmTextsTable::class];
        $this->FilmTexts = TableRegistry::getTableLocator()->get('FilmTexts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FilmTexts);

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
