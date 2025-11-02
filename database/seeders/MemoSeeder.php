<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('memos')->insert([
            ['content' => 'メモ１'],
            ['content' => 'メモ２'],
            ['content' => 'メモ３'],
        ]);
    }
}
