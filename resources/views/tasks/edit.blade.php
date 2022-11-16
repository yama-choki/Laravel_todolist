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
                  <p class="text-white text-xl">Todoアプリ-編集画面</p>
              </div>
          </div>
      </header>

      <main class="grow grid place-items-center">
          <div class="w-full mx-auto px-4 sm:px-6">
              <div class="py-[100px]">
                  <form action="{{ route('tasks.update', ['id' => $item->id]) }}" method="post" class="mt-10">
                      @csrf
                      @method('POST')

                      <div class="flex flex-col items-center">
                          <label class="w-full max-w-3xl mx-auto">
                            <input
                                class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-4"
                                type="text" name="title" value="{{ $task->title }}" placeholder="やること"/>
                            <textarea
                                class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                name="remarks" placeholder="備考">{{ $task->remarks }}</textarea>
                          </label>

                          <x-auth-validation-errors class="mb-4" :errors="$errors" />

                          <div class="mt-8 w-full flex items-center justify-center gap-10">
                              <a href="{{ route('tasks.index') }}" class="block shrink-0 underline underline-offset-2">
                                  戻る
                              </a>
                              <button type="submit"
                                  class="p-4 bg-sky-800 text-white w-full max-w-xs hover:bg-sky-900 transition-colors">
                                  編集する
                              </button>
                          </div>
                      </div>

                  </form>

              </div>
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