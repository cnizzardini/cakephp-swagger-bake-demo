<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Datasource\ConnectionManager;

/**
 * Refreshes the demo database
 */
class TruncateDatabaseCommand extends Command
{
    /**
     * List Cake Routes that can be added to Swagger. Prints to console.
     *
     * @param \Cake\Console\Arguments $args Arguments
     * @param \Cake\Console\ConsoleIo $io ConsoleIo
     * @return int|void|null
     * @throws \ReflectionException
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $connection = ConnectionManager::get('default');
        $connection->execute('TRUNCATE TABLE actors');
        $connection->execute('TRUNCATE TABLE addresses');
        $connection->execute('TRUNCATE TABLE categories');
        $connection->execute('TRUNCATE TABLE countries');
        $connection->execute('TRUNCATE TABLE cities');
        $connection->execute('TRUNCATE TABLE customers');
        $connection->execute('TRUNCATE TABLE employees');
        $connection->execute('TRUNCATE TABLE film_actors');
        $connection->execute('TRUNCATE TABLE film_categories');
        $connection->execute('TRUNCATE TABLE film_texts');
        $connection->execute('TRUNCATE TABLE films');
        $connection->execute('TRUNCATE TABLE inventories');
        $connection->execute('TRUNCATE TABLE languages');
        $connection->execute('TRUNCATE TABLE payments');
        $connection->execute('TRUNCATE TABLE rentals');
        $connection->execute('TRUNCATE TABLE sakila_phinxlog');
        $connection->execute('TRUNCATE TABLE stores');
    }
}
