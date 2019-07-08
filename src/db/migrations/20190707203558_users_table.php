<?php

use Phinx\Migration\AbstractMigration;

class UsersTable extends AbstractMigration
{
  /**
   * Change Method.
   *
   * Write your reversible migrations using this method.
   *
   * More information on writing migrations is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
   *
   * The following commands can be used in this method and Phinx will
   * automatically reverse them when rolling back:
   *
   *    createTable
   *    renameTable
   *    addColumn
   *    addCustomColumn
   *    renameColumn
   *    addIndex
   *    addForeignKey
   *
   * Any other destructive changes will result in an error when trying to
   * rollback the migration.
   *
   * Remember to call "create()" or "update()" and NOT "save()" when working
   * with the Table class.
   */
  public function change()
  {
    $table = $this->table('users');

    $table->addColumn('first_name', 'string', ['limit' => 30, 'null' => false])
      ->addColumn('last_name', 'string', ['limit' => 30, 'null' => false])
      ->addColumn('username', 'string', ['limit' => 200, 'null' => false])
      ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
      ->addColumn('email', 'string', ['limit' => 150, 'null' => false])
      ->addColumn('token', 'string', ['null' => true, 'limit' => 120])
      ->addColumn('deleted', 'boolean', ['default' => false])
      ->addColumn('role_id', 'integer',)
      ->addForeignKey('role_id', 'roles', 'id', ['delete' => 'CASCADE'])
      ->addColumn('activated_at', 'datetime', ['default' => null, 'null' => true])
      ->addTimestamps()
      ->addIndex(['username', 'email', 'token'], ['unique' => true])
      ->create();
  }
}
