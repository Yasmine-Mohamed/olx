<?php

namespace Tests\Unit;

use App\Category;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $category = new Category(['category_name' => 'Clothes']);

        $this->assertEquals('Clothes', $category->category_name);
    }
}
