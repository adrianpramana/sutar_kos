    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header Section</title>
        <link rel="stylesheet" href="dist/output.css">
    </head>

    <body>
        <!-- Header Start -->
        <header class="absolute top-0 left-0 z-10 flex w-full items-center bg-transparent">
            <div class="container">
                <div class="relative flex items-center justify-between">
                    <div class="px-4">
                        <a href="index.php" class="block py-6 text-lg font-bold text-primary">Sutar Kos</a>
                    </div>
                    <div class="flex items-center px-4">
                        <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                            <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                            <span class="hamburger-line transition duration-300 ease-in-out"></span>
                            <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>

                        </button>

                        <nav id="nav-menu" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none">
                            <ul class="block lg:flex">
                                <li class="group">
                                    <a href="index.php" class="mx-8 flex py-2 text-base text-dark group-hover:text-teal-600">Home</a>
                                </li>
                                <li class="group">
                                    <a href="#about" class="mx-8 flex py-2 text-base text-dark group-hover:text-teal-600">About</a>
                                </li>
                                <li class="group">
                                    <a href="#contact" class="mx-8 flex py-2 text-base text-dark group-hover:text-teal-600">Contact</a>
                                </li>
                                <li class="group">
                                    <a href="login.php" class="mx-8 flex py-2 text-base text-dark group-hover:text-teal-600"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>Login</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
        <script src="js/script.js"></script>
    </body>

    </html>