<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Conduit;
use App\Models\User;

class ConduitTest extends TestCase
{
    public function testArticlePageLoads()
    {
        $response = $this->get('/article/Ill quantify the redundant TCP bus, that should hard drive the ADP bandwidth!');

        $response->assertStatus(200);
    }

    public function testArticleCreation()
    {
        $response = $this->post('/create', [
            'headline' => 'Test Headline',
            'headline2' => 'Test Headline 2',
            'text' => 'Test Text',
            'tags' => 'test, unit, php',
        ]);

        $response->assertStatus(302); 

        $this->assertDatabaseHas('conduits', [
            'headline' => 'Test Headline',
            'headline2' => 'Test Headline 2',
            'text' => 'Test Text',
            'tags' => 'test, unit, php',
        ]);

        $article = Conduit::where('headline', 'Test Headline')->first();
        $this->assertNotNull($article); 
        $response = $this->get('/delete/' . $article->id);


        $response->assertStatus(302);


        $this->assertDatabaseMissing('conduits', [
            'headline' => 'Test Headline',
            'headline2' => 'Test Headline 2',
            'text' => 'Test Text',
            'tags' => 'test, unit, php',
        ]);
    }

    public function testArticleDeletion()
    {
        $article = Conduit::factory()->create();

        $response = $this->get('/delete/' . $article->id);

        $response->assertStatus(302); 

        //$this->assertSoftDeleted($article);
    }

    public function testLoginWithCorrect(){
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/login' ,[
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

    }



    public function testLoginWithIncorrect()
    {
        $response = $this->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function tearDown(): void
    {
    
        User::where('email', 'test@example.com')->delete();

        parent::tearDown(); 
    }
}
