@extends('layouts.base')
@section('content')

@section('content')
    <div class="max-w-lg mx-auto w-full pt-20 pl-32">
        <form class="bg-white shadow-md rounded px-12 pt-6 pb-8 mb-4" action="{{ url('pokemon/'.$pokemon->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Name" id="name" name="name" value="{{$pokemon->name}}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                    Type
                </label>
                <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Type" id="type" name="type" value="{{$pokemon->type}}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="power">
                    Power
                </label>
                <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Power" id="power" name="power" value="{{$pokemon->power}}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="health">
                    Health
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Health" id="health" name="health" value="{{$pokemon->health}}" required>
            </div>
            <div class="mb-4">
                <img src="{{ asset($pokemon->image) }}" alt="{{ $pokemon->name }}">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
                    Image
                </label>
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $pokemon->image }}">
            </div>
            <div class="mb-6">
            <label for="trainer_id" class="block text-gray-700 text-sm font-bold mb-2">
                Trainer
            </label>
            <select name="trainer_id" id="trainer_id" required>
                <option value="">Select a Trainer</option>
                @foreach ($trainers as $trainer)
                    @if ($trainer->id === $pokemon->trainer->id)
                        <option value="{{ $trainer->id }}" selected>{{ $trainer->name }}</option>
                    @else    
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>

                    @endif
                @endforeach
            </select>
        </div>
        @can('update', App\Models\Pokemon::class)
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update pokémon
                </button>
            </div>
        @endcan
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2024 Paulo Roberto. All rights reserved.
        </p>
    </div>
@endsection
