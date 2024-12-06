    @extends('layouts.base')

    @section('content')
        <div class="flex flex-wrap justify-center mt-10">
            @foreach($pokemon as $entity)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($entity->image) }}" alt="{{ $entity->name }}"/>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $entity->name }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Type: {{ $entity->type }}</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Power: {{ $entity->power }}</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Health: {{ $entity->health }}</span>
                        @if (isset($entity->trainer->name))
                            <span class="text-sm text-gray-500 dark:text-gray-400">Trainer: {{ $entity->trainer->name }}</span>
                        @else
                            <span class="text-sm text-gray-500 dark:text-gray-400">Trainer: No trainer</span>
                        @endif
                        <div class="flex mt-4 md:mt-6">
                            <a href="{{ url('pokemon/'.$entity->id.'/edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                            <form action="{{ url('pokemon/'.$entity->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 text-red-700">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @endsection


