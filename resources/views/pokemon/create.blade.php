@extends('layouts.base')

@section('content')

    <div class="max-w-lg mx-auto w-full pt-20 pl-32">
    <form class="bg-white shadow-md rounded px-12 pt-6 pb-8 mb-4" action="{{ url('pokemon') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Name" id="name" name="name" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                Type
            </label>
            <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Type" id="type" name="type" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="power">
              Power
            </label>
            <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Power" id="power" name="power" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="health">
                Health
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Health" id="health" name="health" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
                Image
            </label>
            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-6">
            <label for="trainer_id" class="block text-gray-700 text-sm font-bold mb-2">
                Trainer
            </label>
            <select name="trainer_id" id="trainer_id" required>
                <option value="">Select a Trainer</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Create pokémon
        </button>
        </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
        &copy;2024 Paulo Roberto. All rights reserved.
    </p>
    </div>
@endsection


