<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FilmsFixture
 */
class FilmsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'release_year' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'language_id' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rental_duration' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '3', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rental_rate' => ['type' => 'decimal', 'length' => 4, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '4.99', 'comment' => ''],
        'length' => ['type' => 'integer', 'length' => 5, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'replacement_cost' => ['type' => 'decimal', 'length' => 5, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '19.99', 'comment' => ''],
        'rating' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => 'G', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'special_features' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'title' => ['type' => 'index', 'columns' => ['title'], 'length' => []],
            'language_id' => ['type' => 'index', 'columns' => ['language_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'release_year' => 'Lorem ipsum dolor sit amet',
                'language_id' => 1,
                'rental_duration' => 1,
                'rental_rate' => 1.5,
                'length' => 1,
                'replacement_cost' => 1.5,
                'rating' => 'Lorem ipsum dolor sit amet',
                'special_features' => 'Lorem ipsum dolor sit amet',
                'modified' => '2020-04-24 20:59:24',
            ],
        ];
        parent::init();
    }
}
