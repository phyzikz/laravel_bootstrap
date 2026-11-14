<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_page_is_displayed(): void
    {
        $response = $this->get(route('demo'));

        $response->assertOk();
        $response->assertSee(asset('img/example.png'), false);
        $response->assertSee('Half size + upside down', false);
    }
}
