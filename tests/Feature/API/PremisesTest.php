<?php


namespace Tests\Feature\API;


use Tests\TestCase;

class PremisesTest extends TestCase
{
    /*
     * Main Route Tests
     */
    private $baseUrl = '/api/premise';

    public function testAPIRouteIndex()
    {
        $response = $this->get($this->baseUrl);

        $response->assertStatus(200);
    }

    public function testAPIRouteCreate()
    {
        $response = $this->post($this->baseUrl);

        $response->assertStatus(200);
    }

    public function testAPIRouteDelete()
    {
        $id = -1;
        $response = $this->delete($this->baseUrl.'/'.$id);

        $response->assertStatus(200);
    }

    public function testAPIRouteUpdate()
    {
        $id = -1;
        $response = $this->put($this->baseUrl.'/'.$id);

        $response->assertStatus(200);
    }

    public function testAPIRouteShow()
    {
        $id = -1;
        $response = $this->get($this->baseUrl.'/'.$id);

        $response->assertStatus(200);
    }

    /*
     * Test API functions
     */

    public function testAPI()
    {

        //INSERT INITIAL DATA
        $testData = [
            'address' => 'The Main Road',
            'city' => 'Big City',
            'postcode' => 'AB12 3CD',
            'tel' => '01234 567890',
            'email' => 'aaa@bbb.com',
            'description' => 'This is the hotels description'
        ];

        $testData2 = [
            'address' => 'The Main Road2',
            'city' => 'Big City2',
            'postcode' => 'AB12 4CD',
            'tel' => '01234 667890',
            'email' => 'aaa@bab.com',
            'description' => 'This is the hotels longer description'
        ];

        $retrieveIndex = $this->json('get', $this->baseUrl);
        $createResponse = $this->json('post', $this->baseUrl, $testData);
        $id = $createResponse->json('data.id');
        $retrieveResponse1 = $this->json('get', $this->baseUrl.'/'.$id);
        $updateResponse = $this->json('put', $this->baseUrl.'/'.$id, $testData2);
        $retrieveResponse2 = $this->json('get', $this->baseUrl.'/'.$id);
        $deleteResponse = $this->json('delete', $this->baseUrl.'/'.$id);

        $retrieveIndex->assertJsonPath('status', 'ok');
        $createResponse->assertJsonPath('status', 'ok');
        $retrieveResponse1->assertJsonPath('status', 'ok');
        $retrieveResponse2->assertJsonPath('status', 'ok');
        $updateResponse->assertJsonPath('status', 'ok');
        $deleteResponse->assertJsonPath('status', 'ok');
        $deleteResponse->assertJsonPath('data', "{$id}");
    }
}
