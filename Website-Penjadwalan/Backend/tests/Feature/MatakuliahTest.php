<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\matakuliah;
use App\Models\User;

class MatakuliahTest extends TestCase
{
    /**
     * Authenticate user.
     *
     * @return void
     */
    protected function authenticate()
    {
        $user = User::create([
            'name' => 'haloo',
            'email' => rand(12345,678910).'test@gmail.com',
            'password' => \Hash::make('secret9874'),
        ]);

        if (!auth()->attempt(['email'=>$user->email, 'password'=>'secret1234'])) {
            return response(['message' => 'Login credentials are invaild']);
        }

        return $accessToken = auth()->user()->createToken('authToken')->accessToken;
    }

    /**
     * test create matakuliah.
     *
     * @return void
     */
    public function test_create_matakuliah()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST','api/matakuliah',[
            'kode_mk' => '0123',
            'nama_mk' => 'Kalkulus',
            'sks' => '2',
            'semester' => '1',
            'aktif' => 'True',
            'jenis' => 'teori',
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(201);
    }

    /**
     * test update matakuliah.
     *
     * @return void
     */
    public function test_update_matakuliah()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('PUT','api/matakuliah/2',[
           'kode_mk' => '2109',
            'nama_mk' => 'Multimedia',
            'sks' => '2',
            'semester' => '2',
            'aktif' => 'True',
            'jenis' => 'Teori',
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find matakuliah.
     *
     * @return void
     */
    public function test_find_matakuliah()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/matakuliah/');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all matakuliahs.
     *
     * @return void
     */
    public function test_get_all_matakuliah()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/matakuliah');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete matakuliahs.
     *
     * @return void
     */
    public function test_delete_matakuliah()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('DELETE','api/matakuliah/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
 }