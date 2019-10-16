<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

//Carbon - PHPで使える日付操作のライブラリ、Laravelには標準装備

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->truncate();
        //truncate() - todosテーブル内のデータを削除
        DB::table('todos')->insert([
            [
                'title' => 'Laravel Lessonを終わらせる',
                'created_at' => Carbon::create(2018, 1, 1),
                'updated_at' => Carbon::create(2018, 1, 4),
            ],
            [
                'title' => 'レビューに向けて理解を深める',
                'created_at' => Carbon::create(2018, 2, 1),
                'updated_at' => Carbon::create(2018, 2, 5),
            ],
        ]);
    }
}
