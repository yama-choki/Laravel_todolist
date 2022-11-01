<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-[100vh]">
    <header class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-6">
                <p class="text-white text-xl">Todoアプリ</p>
            </div>
        </div>
    </header>

    <main class="grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-[20px]">
                <form action="/tasks" method="post" class="mt-10">
                  @csrf

                  <input type="text" name="title">
                  <textarea name="remarks" id=""></textarea>
                  <button type="submit">追加する</button>

                </form>
            </div>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            @if ($tasks->isNotEmpty())
                <div class="max-w-7xl mx-auto mt-20">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                                            タスク</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($tasks as $item)
                                        <tr>
                                            <td class="px-3 py-4 text-sm text-gray-500">
                                                <div>
                                                    {{ $item->title }}
                                                </div>
                                                <div>
                                                    {{ $item->remarks }}
                                                </div>
                                            </td>
                                            <td class="p-0 text-right text-sm font-medium">
                                                <div class="flex justify-end">
                                                    <div>
                                                        <form action="/tasks/{{ $item->id }}"
                                                            method="post"
                                                            class="inline-block text-gray-500 font-medium"
                                                            role="menuitem" tabindex="-1">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="bg-emerald-700 py-4 w-20 text-white md:hover:bg-emerald-800 transition-colors">完了</button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <a href="/tasks/{{ $item->id }}/edit/"
                                                            class="inline-block text-center py-4 w-20 underline underline-offset-2 text-sky-600 md:hover:bg-sky-100 transition-colors">編集</a>
                                                    </div>
                                                    <div>
                                                        <form action="/tasks/{{ $item->id }}" method="post"
                                                            class="inline-block text-gray-500 font-medium"
                                                            role="menuitem" tabindex="-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="py-4 w-20 md:hover:bg-slate-200 transition-colors">削除</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>
    <footer class="bg-slate-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="py-4 text-center">
            <p class="text-white text-sm">Todoアプリ</p>
        </div>
    </div>
    </footer>
</body>

</html>
