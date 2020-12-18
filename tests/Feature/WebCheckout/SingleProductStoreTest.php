<?php

namespace Tests\Feature\WebCheckout;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SingleProductStoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_the_single_product()
    {
        $product = factory(Product::class)->create();

        $response = $this->get(route('product.index'));

        $response->assertOk()
            ->assertViewIs('product')
            ->assertSee($product->name)
            ->assertSee($product->price)
            ->assertSee($product->image);
    }

    /** @test */
    public function an_authenticated_user_can_access_to_form()
    {
        $product = factory(Product::class)->create();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('form.index', $product));

        $response->assertOk()
            ->assertViewIs('form')
            ->assertViewHas(['product']);
    }

    /** @test */
    public function a_non_authenticated_user_cannot_access_to_form()
    {
        $product = factory(Product::class)->create();

        $response = $this->post(route('form.index', $product));

        $response->assertRedirect('/login')
            ->assertDontSee('product');
    }
}
