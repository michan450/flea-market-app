<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'user_id' => 1,
                'name' => '腕時計',
                'price' => 15000,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'brand_name' => 'Rolax',
                'status' => '1'
            ],
            [
                'user_id' => 1,
                'name' => 'HDD',
                'price' => 5000,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
                'description' => '高速で信頼性の高いハードディスク',
                'brand_name' => '西芝',
                'status' => '2'
            ],
            [
                'user_id' => 1,
                'name' => '玉ねぎ3束',
                'price' => 300,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
                'description' => '新鮮な玉ねぎ3束のセット',
                'brand_name' => null,
                'status' => '3'
            ],
            [
                'user_id' => 1,
                'name' => '革靴',
                'price' => 4000,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
                'description' => 'クラシックなデザインの革靴',
                'brand_name' => null,
                'status' => '4'
            ],
            [
                'user_id' => 1,
                'name' => 'ノートPC',
                'price' => 45000,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
                'description' => '高性能なノートパソコン',
                'brand_name' => null,
                'status' => '1'
            ],
            [
                'user_id' => 1,
                'name' => 'マイク',
                'price' => 8000,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
                'description' => '高音質のレコーディング用マイク',
                'brand_name' => null,
                'status' => '2'
            ],
            [
                'user_id' => 1,
                'name' => 'ショルダーバッグ',
                'price' => 3500,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
                'description' => 'おしゃれなショルダーバッグ',
                'brand_name' => null,
                'status' => '3'
            ],
            [
                'user_id' => 1,
                'name' => 'タンブラー',
                'price' => 500,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
                'description' => '使いやすいタンブラー',
                'brand_name' => null,
                'status' => '4'
            ],
            [
                'user_id' => 1,
                'name' => 'コーヒーミル',
                'price' => 4000,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
                'description' => '手動のコーヒーミル',
                'brand_name' => 'Starbacks',
                'status' => '1'
            ],
            [
                'user_id' => 1,
                'name' => 'メイクセット',
                'price' => 2500,
                'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
                'description' => '便利なメイクアップセット',
                'brand_name' => null,
                'status' => '2'
            ],
        ];

        foreach ($items as $itemData) {
            $item = Item::create($itemData);

             if ($item->name === '腕時計') {
                $item->categories()->attach([1]);
            } elseif ($item->name === 'HDD') {
                $item->categories()->attach([3]);
            } elseif ($item->name === '玉ねぎ3束') {
                $item->categories()->attach([4]);
            } elseif ($item->name === '革靴') {
                $item->categories()->attach([2]);
            } elseif ($item->name === 'ノートPC') {
                $item->categories()->attach([3]);
            } elseif ($item->name === 'マイク') {
                $item->categories()->attach([5]);
            } elseif ($item->name === 'ショルダーバッグ') {
                $item->categories()->attach([2]);
            } elseif ($item->name === 'タンブラー') {
                $item->categories()->attach([6]);
            } elseif ($item->name === 'コーヒーミル') {
                $item->categories()->attach([6]);
            } elseif ($item->name === 'メイクセット') {
                $item->categories()->attach([7]);
            }
        }

    }
}