<?php

namespace App\Http\Controllers;

use App\Classified;
use App\Console\Commands\DestroyClassifiedCommand;
use App\Console\Commands\StoreClassifiedCommand;
use App\Console\Commands\UpdateClassifiedCommand;
use App\Http\Requests;
use App\Http\Requests\StoreClassifiedRequest;
use App\Http\Requests\UpdateClassifiedRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ClassifiedsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classifieds = Classified::all();
        return view('classifieds/index', compact('classifieds'));
    }

    public function search()
    {
        $searchString = Input::get('searchString');

        $classifieds = DB::table('classifieds')->where('title', 'LIKE', '%' . $searchString. '%')->get();
        return view('classifieds/index', compact('classifieds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classifieds/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassifiedRequest $request)
    {
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $price = $request->input('price');
        $condition = $request->input('condition');
        $main_image = $request->file('main_image');
        $location = $request->input('location');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $owner_id = Auth::user()->id;

        // Check if image is uploaded
        if ($main_image) {
            $main_image_file_name = $main_image->getClientOriginalName();
            $main_image->move(public_path('images'), $main_image_file_name);
        } else {
            $main_image_file_name = 'no_image.png';
        }
        $command = new StoreClassifiedCommand($title, $category_id, $description, $price, $condition, $main_image_file_name, $location, $email, $phone, $owner_id);
        $this->dispatch($command);
        return Redirect::route('classifieds.index')->with('message', 'Listing created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classified = Classified::find($id);

        return view('classifieds/show', compact('classified'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classified = Classified::find($id);
        return view('classifieds/edit', compact('classified'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassifiedRequest $request, $id)
    {
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $price = $request->input('price');
        $condition = $request->input('condition');
        $main_image = $request->file('main_image');
        $location = $request->input('location');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $owner_id = 1; //Auth::user()->id;
        $current_image_file_name = Classified::find($id)->main_image;

        // Check if image is uploaded
        if ($main_image) {
            $main_image_file_name = $main_image->getClientOriginalName();
            $main_image->move(public_path('images'), $main_image_file_name);
        } else {
            $main_image_file_name = $current_image_file_name;
        }
        $command = new UpdateClassifiedCommand($id, $title, $category_id, $description, $price, $condition, $main_image_file_name, $location, $email, $phone);
//        $command = new UpdateClassifiedCommand();
        $this->dispatch($command);
        return Redirect::route('classifieds.index')->with('message', 'Listing Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $command = new DestroyClassifiedCommand($id);
        $this->dispatch($command);
        return Redirect::route('classifieds.index')->with('message', 'Listing Removed');
    }
}
