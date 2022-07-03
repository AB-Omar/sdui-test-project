<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_news_index_page(){

        //creating user via factory
        $user = User::factory()->create();

        //login the newly created user via factory
        // Auth::login($user);

        //impersonate as user via ActingAs helper
        $this->actingAs($user);

        $response = $this->get('/news');

        $response->assertStatus(200);
    }

     
    /**
     * test for creating news.
     *
      * @return void
     */
    public function test_users_can_create_news(){

        //creating user via factory
        $user = User::factory()->create();

        //impersonate as user via ActingAs helper
        $this->actingAs($user);

        //creating nes
        $response = $this->post('/news' , [
            'title' => 'News Title',
            'content' => 'News Content',
            'user_id' => $user->id
        ]);

        //check wheter its redirected to the news route
        $response->assertStatus(302);

        //getting the last record of the news table
        $news = News::latest()->first();

        // //checking the property data
        $this->assertEquals('News Title' , $news->title);
        $this->assertEquals('News Content' , $news->content);
        $this->assertEquals($user->id , $news->user->id);
    }

      
    /**
     * test for updating news.
     *
      * @return void
     */
    public function test_users_can_update_news(){

        //creating user via factory
        $user = User::factory()->create();

        //impersonate as user via ActingAs helper
        $this->actingAs($user);

        //creating news
        $response = $this->post('/news' , [
            'title' => 'News Title',
            'content' => 'News Content',
            'user_id' => $user->id
        ]);

        //check wheter its redirected to the news route
        $response->assertStatus(302);

        //getting the last record of the news table
        $news = News::latest()->first();

        //updating the news
        $this->put(route('news.update', $news->id), [

            'title' => 'Title Updated',
            'content' => 'Content Updated',
            'user_id' => $user->id
        ]);

        //getting the updated record of the news table
        $news = News::latest()->first();
        // //checking the property after update
        $this->assertEquals('Title Updated' , $news->title);
        $this->assertEquals('Content Updated' , $news->content);
        $this->assertEquals($user->id , $news->user->id);
    }

     /**
     * test for delete news.
     *
      * @return void
     */
    public function test_users_can_delete_news(){

        //creating user via factory
        $user = User::factory()->create();

        //impersonate as user via ActingAs helper
        $this->actingAs($user);

        //creating news
        $response = $this->post('/news' , [
            'title' => 'News Title',
            'content' => 'News Content',
            'user_id' => $user->id
        ]);

        //check wheter its redirected to the news route
        $response->assertStatus(302);

        //getting the last record of the news table
        $news = News::latest()->first();

        //deleting the news
        $response = $this->call('DELETE', route('news.destroy', $news), ['_token' => csrf_token()]);

        $this->assertEquals(302, $response->getStatusCode());
    }
}
