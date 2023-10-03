<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
<<<<<<< HEAD
    public function category_can_be_created(): void
    {
        $data = $this->data();
=======
    public function root_category_can_be_created(): void
    {
        $data = self::data();
>>>>>>> cats

        $response = $this->post(route('categories.store'), $data);

        $response->assertStatus(302);

        self::assertSame('Test', Category::first()->name);
    }

    /** @test */
    public function name_and_description_is_limited_in_lenght()
    {
        $data = [
            'name' => Str::random(50),
            'description' => Str::random(255),
        ];

        $req = self::post(route('categories.store'), $data);

        $req->assertSessionDoesntHaveErrors();

        $req = self::post(route('categories.store'), [
            'name' => Str::random(51),
            'description' => Str::random(256),
        ]);

        $req->assertSessionHasErrors(['name', 'description']);
    }

    /** @test */
    public function sub_categories_can_be_created()
    {
        $parent = Category::create(self::data());

        $req = self::post(route('categories.store'), [
            'name' => 'sub-category',
            'description' => 'sub category of a category',
            'parent_id' => $parent->id,
<<<<<<< HEAD
            'first_parent_id' => $parent->id,
=======
>>>>>>> cats
        ]);

        $req->assertStatus(302);
        $req->assertSessionDoesntHaveErrors();

<<<<<<< HEAD
        self::assertCount(1, $parent->subCategories()->get());
    }

    /** @test */
    public function first_parent_id_gets_set_automatically()
    {
        $parent = Category::create(self::data());
        $c1 = $parent->subcategories()->create(array_merge(self::data(), [
            'first_parent_id' => $parent->id,
        ]));

        $req = self::post(route('categories.store'), array_merge(self::data(), [
            'parent_id' => $c1->id
        ]));

        // @todo for some reason latest or first returns not expected results
        $grandChild = Category::where('parent_id', $c1->id)->first();

        self::assertTrue($parent->id === $grandChild->first_parent_id);
    }

    /** @test  */
    // this logic needs to be changed
    public function  even_if_first_parent_gets_deleted_its_id_gets_set_to_new_sub_categories()
    {
        $parent = Category::create(self::data());
        $c1 = $parent->subcategories()->create(self::data());
        $parent->delete();


        $req = self::post(route('categories.store'), array_merge(
            self::data(),
            ['parent_id' => $c1->id]
        ));

        $lastCat = Category::where('parent_id', $c1->id)->first();

        self::assertSame($parent->id, $lastCat->first_parent_id);
    }

    /** @test */
    public function  base_category_can_access_all_its_relatives()
    {
        $parent = Category::create(self::data());

        $data = array_merge(self::data(), [
            'first_parent_id' => $parent->id,
        ]);

        $sub = $parent->subCategories()->create($data);

        // for each (sub)category we create a category
        for ($i = 1; $i < 5; $i++) {
            $sub = $sub->subCategories()->create($data);
        }

        self::assertCount(5, $parent->offspring);
=======
        self::assertCount(1, $parent->children()->get());
    }

    /** @test */
    // This Behaviour will change
    public function on_parent_deletion_all_its_descendents_gets_deleted()
    {
        Category::create([
            'name' => 'Foo',
            'children' => [
                [
                    'name' => 'Bar',
                    'children' => [
                        ['name' => 'Baz'],
                    ],
                ],
            ],
        ]);

        self::assertCount(3, Category::get());

        Category::find(1)->delete();
        self::assertCount(0, Category::get());
>>>>>>> cats
    }

    protected static function data(): array
    {
        return [
            'name' => 'Test',
            'description' => 'A test category',
        ];
    }
}
