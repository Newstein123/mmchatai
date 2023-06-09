<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'name' => 'logo',
            'value' => 'logo.png',
            'type' => 'file',
        ]);
        GeneralSetting::create([
            'name' => 'title',
            'value' => 'MMChatAI',
            'type' => 'string',
        ]);
        GeneralSetting::create([
            'name' => 'Website Name',
            'value' => 'MMChatAI',
            'type' => 'string',
        ]);
        GeneralSetting::create([
            'name' => 'openai_key',
            'value' => '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',
            'type' => 'string',
        ]);
        GeneralSetting::create([
            'name' => 'max_tokens',
            'value' => '300',
            'type' => 'integer',
        ]);
    }
}
