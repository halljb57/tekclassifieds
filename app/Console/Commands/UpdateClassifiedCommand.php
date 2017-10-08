<?php

namespace App\Console\Commands;

use App\Classified;
use Illuminate\Console\Command;

class UpdateClassifiedCommand extends Command
{
    public $id;
    public $title;
    public $category_id;
    public $_description;
    public $price;
    public $condition;
    public $main_image;
    public $location;
    public $email;
    public $phone;
    public $owner_id = 1;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($id, $title, $category_id, $description, $price, $condition, $main_image, $location, $email, $phone)
    {
        parent::__construct();
        $this->id           = $id;
        $this->title        = $title;
        $this->category_id  = $category_id;
        $this->_description  = $description;
        $this->price        = $price;
        $this->condition    = $condition;
        $this->main_image   = $main_image;
        $this->location     = $location;
        $this->email        = $email;
        $this->phone        = $phone;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return Classified::where('id', $this->id)->update(array(
            'title'         =>$this->title,
            'category_id'   =>$this->category_id,
            'description'   =>$this->_description,
            'price'         =>$this->price,
            'condition'     =>$this->condition,
            'main_image'    =>$this->main_image,
            'location'      =>$this->location,
            'email'         =>$this->email,
            'phone'         =>$this->phone
        ));
    }
}
