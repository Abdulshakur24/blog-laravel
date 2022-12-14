<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#111",
                    },
                },
            },
        };
    </script>
    <title>Blogger</title>
</head>

<body class="max-w-[1440px] mx-auto">
    <x-flash-message />
    <nav class="flex justify-between items-center">
        <a href="/">
            <img class=" w-16 lg:w-24" src="{{ asset('images/logo.svg') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="hidden md:block">Welcome {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-primary flex items-center">
                        <i class="fa-solid fa-gear mr-2"></i>
                        Manage
                    </a>
                </li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="flex items-center ">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-primary flex items-center">
                        <i class="fa-solid fa-user-plus mr-2 hidden md:block"></i>
                        Register
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-primary flex items-center">
                        <i class="fa-solid fa-arrow-right-to-bracket mr-2 hidden md:block"></i>
                        Login
                    </a>
                </li>
            @endauth
        </ul>
    </nav>

    <main class="mb-20">
        {{ $slot }}
    </main>

</body>

</html>
