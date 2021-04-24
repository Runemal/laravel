<?php

namespace Tests\Unit;

use App\Http\Models\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $model = new News();
        $data = $model->getByCategoryId(1);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

    }
}
