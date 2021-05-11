<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Product;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Select * from cars
        // $cars = Car::all()->toArray();
        $cars = Car::all();
        // $cars = Car::all()->toJson();
        // $cars = json_decode($cars);
        // echo '<pre>';
        // var_dump($cars);
        // echo '</pre>';
        // $cars = Car::where('name',  '=', 'Audi')
            // ->get();
            // ->firstOrFail();

        // $cars = Car::chunk(2, function($cars) {
        //     foreach ($cars as $car) {
        //         echo '<pre>';
        //         print_r($car);
        //         echo '</pre>';
        //     }
        // });
        
        return view('cars.index', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(CreateValidationRequest $request)
    {
        // dd('OK');
        // $car = new Car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();

        // $request->validated();
        // dd($request->all());

        // Methods we can use on $request
        // $test = $request->file('image')->guessExtension();
        // $test = $request->file('image')->getMimeType();
        // $test = $request->file('image')->store();
        // $test = $request->file('image')->getClientOriginalName();
        // $test = $request->file('image')->getSize();
        // $test = $request->file('image')->getError();
        // $test = $request->file('image')->isValid();
        // dd($test);

        $request->validate([
            'name' => 'required',
            'founded'     => 'required|integer|min:1800|max:2021',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        // dd($newImageName);
        // dd($test);

        // $request->validate([
        //     'name'        => 'required|unique:cars',
        //     // 'name'        => new Uppercase,
        //     'founded'     => 'required|integer|min:1800|max:2021',
        //     'description' => 'required',
        // ]);
        //  If it's valid, it will proceed
        //  If it's not valid, throw a ValidationException
        $car = Car::create([
        // $car = Car::make([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
        ]);

        // with Car::make
        // $car->save();

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $car = Car::find($id);
        // echo '<pre>';
        // var_dump($car->products);
        // echo '</pre>';
        $products = Product::find($id);

        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        // dd($car);
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(CreateValidationRequest $request, $id)
    {
        $request->validated();

        $car = Car::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'founded' => $request->input('founded'),
                'description' => $request->input('description'),
        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Car $car)
    {
        // dd($id);
        // $car = Car::find($id);
        // $car = Car::where('id', $id);
        // dd($car);
        $car->delete();

        return redirect('/cars');
    }
}
