<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Message::create([
        'sender_id' => 2, // Pastikan ID user ini ada di tabel users
        'receiver_id' => 1, // ID Admin (Anda)
        'subject' => 'Regarding the upcoming parent-teacher meeting',
        'body' => 'Dear Admin, I hope this message finds you well...',
        'is_read' => false,
        'is_important' => true,
        'label' => null,
    ]);

    \App\Models\Message::create([
        'sender_id' => 3,
        'receiver_id' => 1,
        'subject' => 'Need to discuss exam schedule',
        'body' => 'Hi, I would like to talk about the schedule...',
        'is_read' => true,
        'is_important' => false,
        'label' => 'Reminder',
    ]);
}
}
