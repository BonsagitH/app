<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users', ['id' => false, 'primary_key' => 'uid'])
        ->addColumn('uid', 'integer', [
            'autoIncrement' => true,
            'limit' => 11,
            'default' => null,
            'null' => false
        ])
        ->addColumn('phone_number', 'string', [
            'default' => null,
            'null' => false,
            'limit' => 20,
        ])
        ->addColumn('username', 'string', [
            'default' => null,
            'null' => false,
            'limit' => '255'
        ])
        ->addColumn('password', 'string', [
            'default' => null,
            'null' => false,
            'limit' => '255'
        ])
        ->addColumn('role', 'enum', [
            'values' => [
               '1', '2', '3', '4', '5'
            ],
            'default' => null,
            'null' => false,
        ])
        ->addColumn('created', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => true,
        
        
        ])->addColumn('modified', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->create();
    }
}
