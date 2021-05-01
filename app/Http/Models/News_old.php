<?php


namespace App\Http\Models;


class NewsOld
{
    private $news = [
        1 => [
            '1' => 'This is news 1 text.',
            '2' => 'This is news 2 text.',
            '3' => 'This is news 3 text.',
            'category_id' => '1',
        ],
        2 => [
            '1' => 'This is news 1 text.',
            '2' => 'This is news 2 text.',
            '3' => 'This is news 3 text.',
            'category_id' => '2',
        ],
        3 => [
            '1' => 'This is news 1 text.',
            '2' => 'This is news 2 text.',
            '3' => 'This is news 3 text.',
            'category_id' => '3',
        ]
    ];

    public function getByCategoryId (int $categoryId){
        $news = [];
        foreach ($this->news as $id => $item){
            if ($item['category_id'] == $categoryId){
                $news[$id] = $item;
            }
        }
        return $news;
    }
}
