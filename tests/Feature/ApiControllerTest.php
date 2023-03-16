<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson(route('api.tracks.index'));

        $response->dump();
        $response->assertStatus(200);
    }
}
