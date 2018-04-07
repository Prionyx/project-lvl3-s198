<?php

use Illuminate\Http\Request;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{

    use DatabaseMigrations, DatabaseTransactions;

    protected $table = 'domains';

    public function testHome()
    {
        $this->get(route('home'));

        $this->assertResponseOk();
    }

    public function testDomains()
    {
        $this->get(route('domains'));

        $this->assertResponseOk();
    }

    public function testCreate()
    {
        $url = 'http://www.google.com';
        $path = route('domains');
        $this->post($path, ['url' => $url]);
        $this->assertResponseStatus(302);
        $this->seeInDatabase('domains', ['name' => $url]);
    }
}
