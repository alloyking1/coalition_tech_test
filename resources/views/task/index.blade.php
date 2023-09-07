<x-app>
    <div class="mx-[10%] mt-8">
        @if (session()->has('success'))
        <div class="p-4 bg-green-500 text-white mt-3">
            {{ Session::get('success') }}
        </div>
        @endif
        
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-1">Create Task</h1>
            <form action="{{ route('task.create') }}" method="post">
                @csrf
                <input type="text" name="name" class="border rounded w-auto p-3" placeholder="Enter task name">
                <input type="number" name="priority" class="border rounded w-auto p-3" placeholder="Enter task priority">
                <button class="p-3 bg-blue-500 text-white rounded">create task</button>
            </form>
        </div>
        <hr>
        <div class="grid grid-cols-1 md:grid-cols-4 p-4 gap-2">
            @foreach ($task as $taskValue)
            <div class="border border-gray-300 p-6 rounded shadow">
                <h1 class="text-2xl font-bold">{{ $taskValue->name }}</h1>
                <p>Priority: {{ $taskValue->priority }}</p>
                <div class="mt-2">

                    <a href="{{ route('task.edit', $taskValue->id) }}">Edit</a>
                    <form action="{{ route('task.delete', $taskValue->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button href="" class="text-red-500">Delete</button>
                    </form>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app>