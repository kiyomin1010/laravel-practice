<!DOCTYPE html>
<html lang="en">

<head>
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        label {
            /* @apply is used to combine multiple utility classes into a single custom class */
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .btn {

            @apply rounded-md px-2 py-1 text-center text-slate-700 font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-red-500
        }

        .error {
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
</head>

<body class="container mx-auto my-10 max-w-lg">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div>
        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>

</html>
