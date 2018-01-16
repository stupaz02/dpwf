<?php

use Illuminate\Database\Seeder;
use App\Event;
class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title'=>'Demo Event-1', 'start_date'=>'2018-01-11', 'end_date'=>'2018-01-12'],
        	['title'=>'Demo Event-2', 'start_date'=>'2018-01-12', 'end_date'=>'2018-01-13'],
        	['title'=>'Demo Event-3', 'start_date'=>'2018-01-14', 'end_date'=>'2018-01-14'],
        	['title'=>'Demo Event-3', 'start_date'=>'2018-01-16', 'end_date'=>'2018-01-17'],
        ];
        foreach ($data as $key => $value) {
        	Event::create($value);
        }
    }
}
