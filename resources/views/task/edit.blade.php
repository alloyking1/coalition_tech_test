<x-app>
    <div class="mx-[10%]">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-1">Edit Task</h1>
            <form action="{{ route('task.create', $task->id) }}" method="post">
                @csrf
                <input type="text" name="name" class="border rounded w-auto p-3" value="{{ $task->name ?? '' }}" placeholder="Enter task name">
                <input type="number" name="priority" class="border rounded w-auto p-3" value="{{ $task->priority ?? '' }}" placeholder="Enter task priority">
                <button class="p-3 bg-blue-500 text-white rounded">Edit task</button>
            </form>
        </div>
        <hr>
    </div>
</x-app>