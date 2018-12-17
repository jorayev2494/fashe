<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class MyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->assertTrue(true);

        // $response = $this->call("GET", "/login");
        $response = $this->get("/category");


        // $response->assertAuthenticatedAs();
        // dd($response);

        // $response->assertStatus(200);

        $this->assertEquals(15, 15);

    }


    function testUser()
    {
        $user = factory(User::class)->make();

        $test = $this->get(route("index"));

        // dd($test); 


        // $this->assertEquals();

        // dd($user->toArray());

        // $this->assertEquals(5, count($users));

    }
}
