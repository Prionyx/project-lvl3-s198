<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseMigrations, DatabaseTransactions;

    protected $table = 'domains';

    public function testHome()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

    public function testCreate()
    {
        $this->post('/domains', ['url' => 'http://google.com/']);

        $this->seeInDatabase($this->table, ['name' => 'http://google.com/']);
    }
}
