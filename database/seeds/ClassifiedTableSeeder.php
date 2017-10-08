<?php

use App\Classified;
use Illuminate\Database\Seeder;

class ClassifiedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classified = new Classified();
        $classified->title = 'HP All in One';
        $classified->category_id = '1';
        $classified->price = '449.99';
        $classified->main_image = 'item1.png';
        $classified->condition = 'New';
        $classified->location = 'Boston, Ms';
        $classified->email = 'some@mail.com';
        $classified->phone = '888-888-8888';
        $classified->category_id = '1';
        $classified->owner_id = '1';
        $classified->description = 'When it comes to quality and performance, the HP All-in-One PC has your family covered. Home to your favorite entertainment, this beautifully designed PC does more than help you stay connected, it exceeds expectations - from enjoying quality downtime to helping you to tackle all your daily needs with confidence. ';
        $classified->save();

        $classified = new Classified();
        $classified->title = 'Microsoft Surface Pro';
        $classified->category_id = '3';
        $classified->price = '899.99';
        $classified->main_image = 'item_3.jpg';
        $classified->condition = 'New';
        $classified->location = 'New York, NY';
        $classified->email = 'surface.mail.com';
        $classified->phone = '333-444-5555';
        $classified->category_id = '3';
        $classified->owner_id = '1';
        $classified->description = 'Good as new, each refurbished Surface Book and Surface Pro 4 undergo a rigorous refurbishing process that includes hardware and cosmetic quality inspections, software updating, and diagnostic testing. And all refurbished Surface devices are backed by a manufacturers';
        $classified->save();
    }
}
