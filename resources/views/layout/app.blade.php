<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>


    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-red-500 text-sm
        }
    </style>
        {{-- blade-formatter-enable --}}
    <title>Document</title>

</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-orange-600 text-2xl mb-4">@yield('title')<h1>
            <div>

                @if (session()->has('sucess'))
                    <div class="mb-8 rounded border border-gray-400 bg-green-100 px-4 py-3 text-lg text-green-700">
                        <div>{{ session('sucess') }}</div>
                    </div>
                @endif


                @yield('content')
            </div>
</body>

</html>
