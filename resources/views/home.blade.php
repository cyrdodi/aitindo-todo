<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aitindo To Do App</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
    rel="stylesheet">
</head>

<body class="min-h-screen bg-red-50" style="font-family: Plus Jakarta Sans, sans-serif">
  <div class="flex items-center justify-center ">
    <div class="p-4 mt-8 ">
      {{-- title --}}
      <div class="flex items-center justify-center mb-4 space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h1 class="text-2xl font-semibold text-red-600 ">Aitindo To Do App</h1>
      </div>

      {{-- input task --}}
      <x-card>

        <form action="" method="post">
          @csrf
          <div class="flex w-full space-x-3">
            <input type="text" class="flex-1 p-2 border border-red-100 rounded-lg" name="name" placeholder="Task">
            <button type="submit" class="px-4 py-2 text-red-600 bg-red-100 rounded-lg">Add</button>
          </div>
          @error('name')
          <div class="mt-2 text-xs text-red-700">{{ $message }}</div>
          @enderror
        </form>
      </x-card>

      {{-- tasks list --}}
      <x-card>
        <ul class="divide-y ">
          @foreach ($tasks as $task)
          <li class="flex items-center justify-between px-3 py-2">
            <div class="mr-4">
              <form action="/task/{{ $task->id }}" method="post">
                @csrf
                @method('PUT')
                <input type="checkbox" value="{{  $task->complete }}" name="status" onChange="this.form.submit()"
                  id="item{{ $task->id }}" {{ $task->complete
                == 1 ? 'checked' : '' }}>
                <label for="item{{ $task->id }}" class="ml-2 {{ $task->complete == 1 ? 'line-through' : ''  }}">{{
                  $task->name
                  }}</label>
              </form>
            </div>
            <div class="flex">
              <form action="/task/{{ $task->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-1 text-sm text-red-600 bg-red-100 rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </form>
            </div>
          </li>
          @endforeach
        </ul>
      </x-card>
    </div>
  </div>
</body>

</html>