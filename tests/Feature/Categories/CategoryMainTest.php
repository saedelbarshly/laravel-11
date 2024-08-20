<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryMainTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/index'); // call route 

    //     $response->assertStatus(200); // check response status
    // }

    // public function test_put_function_example(): void
    // {
    //     $response = $this->put('/put');
    //     $response->assertStatus(200);
    // }

    // public function test_delete_function_example(): void
    // {
    //     // if route return json
    //     $response = $this->deleteJson('/delete');
    //     // dd($response->getContent());
    //     // dd($response->json()['msg']);
    //     $response->assertStatus(200);
    // }

    public function test_index(): void
    {
        // $categories = Category::insert([
        //     [
        //         'id' => 1,
        //         'name' => 'category 1',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'category 2',
        //     ]
        // ]);
        $categories = Category::factory()->count(2)->create();
        $response = $this->get('/category/index');
        $response->assertStatus(200);
        $data = $response->json();
        $this->assertEquals(2,count($data));
        foreach($categories as $key => $category)
        {
            $this->assertDatabaseHas('categories',[
                'id' => $category->id,
                'name' => $category->name,
            ]);

            $this->assertDatabaseHas('categories',$category->toArray());
        }
        // $response->assertJson([
        //     [
        //         'id' => 1,
        //         'name' => 'category 1',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'category 2',
        //     ]
        // ]);
    }

    public function test_create(): void
    {
        $category = [
            'name' => 'category 1',
        ];
        // $header = [
        //     'Accept' => 'application/json',
        //     'Content-Type' => 'application/json',
        //     'token' => 'Bearer ' . $this->getToken(),
        // ];
        $response = $this->post('/category/create', $category);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', $category);
        $response->assertJson($category);
    }


    public function test_delete(): void
    {
        $category = Category::factory()->create();
        $response = $this->delete('/category/delete/'. $category->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('categories',$category->toArray());
    }

    public function test_update(): void
    {
        $category = Category::factory()->create();
        $data = ["name" => "Test Update Category",];
        $response = $this->put('/category/update/'. $category->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', $data);
        $response->assertJson($data);
    }

}
