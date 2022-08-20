<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => mb_substr($this->faker->city(), 0, -1) . $this->titleWord[rand(0, count($this->titleWord) - 1)] . 'コース',
            'location' => $this->faker->prefecture(),
            'distance' => $this->faker->numberBetween(1, 40),
            'description' => $this->faker->realTextBetween(10, 50, 5),
            'created_at' => $this->faker->dateTimeBetween('-2 months'),
        ];
    }

    public $titleWord = [
        'フォレスト',
        'ローリング',
        'サイレント',
        'レッドウッド',
        'メイプル',
        'オーシャン',
        'シー',
        'スカイ',
        'ダイアモンド',
        'マウンテン',
        'ビレッジ',
        'キャンプ',
        'リバー',
        'ベイ',
        'スプリング',
        'サマー',
        'ヒル',
        'ヒルサイド',
        'グリーンウッド',
        'ゴースト',
        'スクエア',
        'シティ',
    ];
}
