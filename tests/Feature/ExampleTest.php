<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response_for_base_view()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_api_returns_successful_response_for_get()
    {
        $response = $this->get('/api/');

        $response->assertStatus(200);
    }

    public function test_api_returns_empty_when_no_parameters_given()
    {
        $response = $this->getJson('/api');

        $this->assertEmpty(json_decode($response->getContent())->data);
    }

    public function test_api_returns_not_empty_when_given_length_not_zero()
    {
        $response = $this->getJson('/api?length=1');

        $this->assertNotEmpty(json_decode($response->getContent())->data);
    }

    public function test_api_returns_different_values_with_different_inputs()
    {
        $firstResponse = $this->getJson('/api?length=1&start=7');
        $firstResponseData = json_decode($firstResponse->getContent())->data;

        $secondResponse = $this->getJson('/api?length=3&start=8');
        $secondResponseData = json_decode($secondResponse->getContent())->data;

        $this->assertTrue($firstResponseData != $secondResponseData);
    }

}
