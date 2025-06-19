<?php

namespace Tests\Unit;


use Tests\TestCase;

class LeadApiTest extends TestCase
{
    /** @test */
    public function get_leads_endpoint_returns_successfully()
    {
        $response = $this->getJson('/api/leads');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'surname',
                            'email',
                            'phone',
                            'status',
                            'created_at',
                            'updated_at',
                        ]
                    ],
                    'links'
                 ]);
    }

}
