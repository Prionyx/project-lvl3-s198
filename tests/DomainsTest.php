<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{

    use DatabaseMigrations, DatabaseTransactions;

    protected $table = 'domains';

    public function testHome()
    {
        $response = $this->get(route('home'));

        $this->assertResponseOk();
    }

    public function testDomains()
    {
        $response = $this->get(route('domains'));

        $this->assertResponseOk();
    }

    public function testCreate()
    {
        $url = 'http://www.google.com';
        $this->post(route('domains'), ['url' => $url]);
        $this->seeInDatabase('domains', ['name' => $url]);
    }
}
