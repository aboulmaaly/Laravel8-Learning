@extends('layouts.cars.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Cars
            </h1>
        </div>
        <div class="pt-10">
            <a href="cars/create" class="border-2 rounded-lg py-2 px-4 border-solid italic text-gray-500">Add new car </a>
        </div>
        <div class="w-5/6 py-10">
            @foreach ($cars as $car)
                <div class="m-auto">
                    <div class="float-right grid grid-cols-1">
                        <a href="cars/{{ $car->id }}/edit" class="border-2 rounded-lg py-1 px-3 border-solid italic text-green-500">Edit</a>
                        <form action="cars/{{ $car->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="mt-2 border-2 rounded-lg py-1 px-3 border-solid italic text-red-500">Delete</button>
                        </form>
                    </div>
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Founded: {{ $car->founded }}
                    </span>
                    <h2 class="text-gray-700 text-5xl">
                        {{ $car->name }}
                    </h2>
                    <p class="text-lg text-gray-700 py-6">
                        {{ $car->description }}
                    </p>
                    <hr class="mt-4 mb-8">
                </div>
            @endforeach
        </div>
    </div>
@endsection