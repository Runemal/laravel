<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /** @var Generator */
    protected $faker;


    /**
     * Run the database seeds.
     *
     * @param Generator $faker
     * @return void
     */
    public function run(Generator $faker)
    {
        $this->faker = $faker;

        \DB::table('news')
            ->insert($this->generationData());

        \DB::table('category')
            ->insert($this->generationCategory());

        \DB::table('status')
            ->insert($this->generationStatus());
    }

    public function generationData(): array{
        $data = [];
        for ($i = 1; $i <= 25; $i++) {
            $data[] = [
                'title' => $this->faker->text(25),
                'description' => $this->faker->text(),
                'source' => $this->faker->url,
                'publish_date' => $this->faker->date,
                'status_id' =>$this->faker->boolean,
                'category_id' => $this->faker->randomNumber(1),
            ];
        }
        return $data;

    }

    public function generationCategory(): array{
        $data = [];
        for ($i = 0; $i <= 9; $i++) {
            $data = [
                'name' => $this->faker->name,
            ];
        }
        return $data;
    }

    public function generationStatus(): array{
        $data = [];
        for ($i = 0; $i <= 1; $i++) {
            $data = [
                'name' => $i,
            ];
        }
        return $data;
    }

}
