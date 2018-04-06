<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{

    use DatabaseMigrations, DatabaseTransactions;

    protected $table = 'domains';

    public function testHome()
    {
        //$response = $this->call('GET', '/');

        $response = $this->get('/');
        $this->assertResponseOk();
    }

    public function testDomains()
    {
        $response = $this->get('/domains');

        $this->assertResponseOk();
    }

    public function testCreate()
    {
        $this->post('/domains', ['url' => 'http://google.com/']);

        $this->seeInDatabase($this->table, ['name' => 'http://google.com/']);
    }
}
