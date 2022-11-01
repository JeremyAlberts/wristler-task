<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wristler tasks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>
<body>
<div class=" container mx-auto p-8">
    <div class="w-full bg-gray rounded-lg shadow-md">
        <div class="flex justify-between rounded-t-lg items-center bg-primary py-5 px-4">

            <form action="{{ route('store') }}" method="POST" class="flex w-full">
                @csrf
                <input name="content" type="text" class="py-3 px-6 bg-white transition border-2 border-secondary rounded w-full placeholder-opacity-50 placeholder-black focus:outline-none focus:border-secondary" placeholder="Add task">
                <button type="submit" class="bg-secondary hover:bg-secondary text-white font-bold ml-2 py-2 px-6 rounded-full">
                    Add
                </button>
            </form>
        </div>
        <div class="flow-root px-6 py-3">
            @if(count($tasks))
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($tasks as $task)
                        <li class="py-4 flex items-center space-x-4">
                            <div class="flex justify-between content-center min-w-0 w-full">
                                <div class="flex items-center">
                                    <form action="{{ route('update', $task->id) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="{{ $task->isDone ? "bg-primary text-white border-transparent hover:border-primary hover:bg-white hover:text-primary" : "bg-white text-primary border-priamry hover:border-transparent hover:bg-primary hover:text-white" }} border-2 font-bold px-2 py-1 rounded mr-3">
                                            <i class="fa-solid fa-check "></i>
                                        </button>
                                    </form>
                                    <p class="text-lg font-medium text-primary truncate">
                                        {{ $task->content }}
                                    </p>
                                </div>

                                <form action="{{ route('destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-secondary hover:bg-secondary text-white font-bold ml-2 py-2 px-6 rounded-full">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="py-4 flex items-center space-x-4">
                    <p class="text-lg font-medium text-primary truncate">no tasks</p>
                </div>
            @endif
        </div>
    </div>
</div>


</body>
</html>
