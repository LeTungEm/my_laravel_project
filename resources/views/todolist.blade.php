<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body>
  <div class="w-fit m-auto">
    <h1 class="text-center text-3xl font-bold text-blue-700 mb-10">
      todolist
    </h1>
    <form method="post" action="{{ route('insertToDoList') }}">
      @csrf
      <div class="mb-5 flex gap-5">
        <input placeholder="Nhập tên công việc..." class="border block" type='text' name="todoName" />
        <button class="px-2 py-1 rounded-md border bg-slate-400 hover:bg-slate-500">Thêm</button>
      </div>
    </form>
    @if ($err)
        <div class="text-red-500">{{ $err }}</div>
    @endif
    <div class="mt-5">
      <h2 class="font-bold text-xl text-center">Danh sách công việc</h2>
      <div class="">
        @foreach ($todolist as $item)
            <div class="p-1 mb-2 border">
              <div class="flex justify-between gap-5">
                <span>{{ $item->id }}</span>
                <span>{{ $item->name }}</span>
                <form action="{{ route('deleteToDoList') }}" method="post">
                  @csrf
                  <input hidden type="text" name="todoId" class="btn-delete-todo" value="{{ $item->id }}">
                  <button>Xóa</button>
                </form>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</body>

</html>