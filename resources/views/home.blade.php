<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aitindo To Do App</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-red-50 min-h-screen">
  <div class=" flex items-center justify-center">
    <div class="shadow-sm rounded-lg bg-white p-4 mt-8">
      {{-- title --}}
      <div class="flex items-center justify-center space-x-2 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h1 class="text-lg font-semibold text-red-600 ">Aitindo To Do App</h1>
      </div>

      <div class="">
        <form action="" method="post">
          @csrf
          <div class="flex space-x-3 ">
            <input type="text" class="p-2 border border-red-200 rounded-lg" id="floatingInput" name="task"
              placeholder="add your task">
            <button type="submit" class="rounded-lg text-red-600 bg-red-100 py-2 px-4">Submit</button>
          </div>
        </form>

        {{-- tasks list --}}

        <ul class=" mt-4 divide-y">
          @foreach ($tasks as $task)
          <li class="flex items-center justify-between px-3 py-2">
            <div class="{{ $task->status == '0' ? 'text-decoration-line-through' : '' }}">
              {{ $task->task }}
            </div>
            <div class="flex">
              <form action="/task/{{ $task->id }}" method="post">
                @csrf
                @method('PUT')
                @if($task->status == '1')
                <button type="submit" class="px-2 py-1 rounded-lg bg-">Done</button>
                @endif
              </form>
              <form action="/task/{{ $task->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right">Delete</button>
              </form>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  </div>
</body>

</html>