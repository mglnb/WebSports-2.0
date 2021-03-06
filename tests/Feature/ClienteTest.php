<?php

namespace Tests\Feature;

use App\Cliente;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteTest extends TestCase
{
//    protected $fillable = array('nome', 'email', 'cpf', 'saldo', 'endereco_id');
//    protected $fillable = array('rua', 'numero', 'complemento', 'cidade', 'cep');

    public function test_cliente_index()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user, 'api');

        $clientes = $this->json('GET', '/api/clientes/')
            ->assertJsonFragment(array(
                "id" => 1
            ))
            ->assertStatus(200);
//            ->getContent();
//        fwrite(STDERR, print_r(json_decode($clientes), TRUE));
    }

    public function test_cliente_create() {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user, 'api');

        $clientes = $this->json('POST', '/api/clientes/', array(
            "nome" => "Miguel Boanova",
            "email" => "mgl.deadly@gmail.com",
            "cpf" => "03812114011",
            "saldo" => 200,
            "endereco" => array(
                "rua" => "Rua Dr João Pessoa",
                "numero" => 799,
                "complemento" => "APT 201",
                "cidade" => "Pelotas",
                "cep" => "96010470"
            )
        ))->assertJsonFragment(array(
            "status" => "Cadastrado com sucesso"
        ))->assertStatus(200);
    }

    public function test_cliente_update() {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user, 'api');

        $clientes = $this->json('PUT', '/api/clientes/3', array(
            "nome" => "Miguel Novack",
            "endereco" => array(
                "rua" => "Rua Dr Joao Pessoa",
            )
        ))->assertJsonFragment(array(
            "status" => "Alterado com sucesso"
        ))->assertStatus(200);
    }

    public function test_client_show() {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user, 'api');
        $cliente = Cliente::find(3);


        $clientes = $this->json('GET', '/api/clientes/3')
            ->assertJsonFragment(array(
                "nome" => $cliente->nome
            ))->assertStatus(200);
    }
}
