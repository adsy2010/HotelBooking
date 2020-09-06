<?php


namespace Tests\Feature\API;


use Tests\TestCase;

class RoomTypesTest extends TestCase
{
    /*
     * Main Route Tests
     */
    private $baseUrl = '/api/roomtypes';

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
            'name' => 'The Main Room',
            'description' => 'A big room',
            'hasTV' => 1,
            'hasFacilities' => 1,
        ];

        $testData2 = [
            'name' => 'The Second Main Room',
            'description' => 'Another big room',
            'hasTV' => 0,
            'hasFacilities' => 1,
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
