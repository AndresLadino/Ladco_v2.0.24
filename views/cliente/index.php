<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ladco Steel | Industria Metalmecánica</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <?php
    // Verificar si el usuario ha iniciado sesión
    session_start();
    if (!isset($_SESSION['usuario'])) {
        // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
        header('Location: login.html');
        exit();
    }
    $nombreUsuario = $_SESSION['nombre'];

    ?>
     <script src="../src/js/clima.js"></script>
    <nav class="fixed top-0 z-50 w-full bg-neutral-950 ">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ml-2 md:mr-24">
                        <img src="../src/image/logo.png" class="h-13 mr-3" alt="Ladco Steel Logo" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button" class="flex text-sm bg-amber-300 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 32.000000 32.000000" preserveAspectRatio="xMidYMid meet">

                                    <g transform="translate(0.000000,32.000000) scale(0.100000,-0.100000)" stroke="none">
                                        <path d="M112 247 c-26 -27 -28 -54 -6 -85 14 -20 14 -23 -1 -28 -27 -11 -58
-84 -35 -84 6 0 10 6 10 14 0 8 8 24 18 36 16 20 19 21 31 6 17 -20 45 -20 62
0 12 15 15 14 31 -6 10 -12 18 -28 18 -36 0 -8 5 -14 10 -14 23 0 -8 73 -35
84 -15 5 -15 8 -1 28 22 32 20 61 -7 86 -30 28 -68 28 -95 -1z m82 -13 c31
-30 9 -84 -34 -84 -24 0 -50 26 -50 50 0 24 26 50 50 50 10 0 26 -7 34 -16z
m-22 -116 c-9 -9 -15 -9 -24 0 -9 9 -7 12 12 12 19 0 21 -3 12 -12z" />
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base w-56  list-none text-white bg-neutral-800 divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">

                            <div class="px-4 py-3" role="none">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 32.000000 32.000000" preserveAspectRatio="xMidYMid meet">

                                    <g transform="translate(0.000000,32.000000) scale(0.100000,-0.100000)" stroke="none">
                                        <path d="M112 247 c-26 -27 -28 -54 -6 -85 14 -20 14 -23 -1 -28 -27 -11 -58
-84 -35 -84 6 0 10 6 10 14 0 8 8 24 18 36 16 20 19 21 31 6 17 -20 45 -20 62
0 12 15 15 14 31 -6 10 -12 18 -28 18 -36 0 -8 5 -14 10 -14 23 0 -8 73 -35
84 -15 5 -15 8 -1 28 22 32 20 61 -7 86 -30 28 -68 28 -95 -1z m82 -13 c31
-30 9 -84 -34 -84 -24 0 -50 26 -50 50 0 24 26 50 50 50 10 0 26 -7 34 -16z
m-22 -116 c-9 -9 -15 -9 -24 0 -9 9 -7 12 12 12 19 0 21 -3 12 -12z" />
                                    </g>
                                </svg>
                                <p class="text-sm font-bold text-white dark:text-white" role="none">
                                    <?php echo $nombreUsuario; ?>
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="/dashboard" class="block px-4 py-2 text-sm text-slate-100 hover:bg-slate-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Inicio</a>
                                </li>
                                <!--<li>
                                    <a href="/modificarDatos/{{ auth()->user()->id }}/edit"

                                        class="block px-4 py-2 text-sm text-slate-100 hover:bg-slate-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Editar perfil</a>
                                </li>-->
                                <li>
                                    <a href="../src/php/logout.php" class="block px-4 py-2 text-sm text-slate-100 hover:bg-slate-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Cerrar sesión</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="sidebar-multi-level-sidebar" class="fixed left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full top-0 pt-20 px-3 py-4 overflow-y-auto bg-neutral-950 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">

                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-slate-800 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 50 50">
                            <path d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Inicio</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="../dashboard" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-slate-800 dark:text-white dark:hover:bg-gray-700">Gestión</a>
                        </li>
                        <li>
                            <a href="ladcosteel.com.co" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-slate-800 dark:text-white dark:hover:bg-gray-700">Página
                                web</a>
                    </ul>
                </li>
                <li>
                    <a href="cliente/index.php" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-slate-800 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Gestionar clientes</span>
                        <!--<span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>-->
                    </a>
                </li>
                <li>
                    <a href="/blog" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-slate-800 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Gestionar blog</span>
                        <!--<span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>-->
                    </a>
                </li>
                <li>
                    <a href="/produccion" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-slate-800 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Gestionar producción</span>
                        <!--<span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>-->
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <div class="mt-12 pt-12 sm:ml-64">
        <div class="bg-stone-100 h-full">

            <div class="flex h-screen">
                <!-- Primer grid -->
                <div class="w-4/6  flex flex-col p-8 text-center ">
                    <!--Tarjeta-->
                    <div class="flex flex-col bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-6xl ">


                        <div class="flex flex-col p-8 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                ¡Que bueno tenerte de vuelta, <?php echo $nombreUsuario; ?>!
                            </h5>

                            <p id="fraseMostrada" class="mb-3 text-lg font-semibold text-gray-700 dark:text-gray-400"></p>
                            <div></div>
                        </div>
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-[15rem] md:w-full md:rounded-none md:rounded-s-lg" src="../src/image/bienvenida.svg" alt="" style="transform: scaleX(-1)">
                    </div>
                    <!--Tarjetas 3-->
                    <div class="px-2 mt-10">
                        <div class="flex -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="bg-[#fee3ac] h-96 rounded-md shadow-xl transition ease-in-out delay-80 hover:scale-105 pt-10">
                                    <h1 class="text-2xl font-bold tracking-tight text-gray-900">La pregunta del día de hoy es...
                                    </h1>
                                    <div id="question-container" class="mt-20 text-lg font-semibold text-gray-700 dark:text-gray-400">
                                        <!-- La pregunta se mostrará aquí -->
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/3 px-2">
                                <div id="weather-info" class="bg-[#fbb737] h-96 rounded-md shadow-xl transition ease-in-out delay-80 hover:scale-105 pt-10">
                                    
                                </div>
                            </div>
                            <div class="w-1/3 px-2">
                                <div class="bg-[#fddb94] h-96 rounded-md shadow-xl transition ease-in-out delay-80 hover:scale-105 p-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Segundo grid -->
                <div class="w-2/6 bg-zinc-100 flex flex-col  p-8 text-center ">
                    <blockquote class="max-w-2xl  mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Nuestros últimos clientes</h3>
                    </blockquote>
                    <!--Clientes-->
                    <figcaption class="flex items-center justify-center">
                        <!--<div
                        class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Hemos trabajado con...
                            </h5>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Neil Sims
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                email@windster.com
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full"
                                                src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Bonnie Green
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                email@windster.com
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            $3467
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full"
                                                src="/docs/images/people/profile-picture-2.jpg" alt="Michael image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Michael Gough
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                email@windster.com
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            $67
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full"
                                                src="/docs/images/people/profile-picture-4.jpg" alt="Lana image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Lana Byrd
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                email@windster.com
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            $367
                                        </div>
                                    </div>
                                </li>
                                <li class="pt-3 pb-0 sm:pt-4">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full"
                                                src="/docs/images/people/profile-picture-5.jpg" alt="Thomas image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Thomes Lean
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                email@windster.com
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            $2367
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>-->
                        <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-4">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Hemos trabajado con...
                                </h5>
                            </div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($clientes as $cliente)
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-1 min-w-0">
                                                <h1 class="text-sm text-gray-600 ">
                                                    Hace poco trabajamos con <span class="text-sm font-medium text-gray-900 ">{{ $cliente['nombre'] }}</span>,
                                                    de la empresa <span class="text-sm font-medium text-amber-500 ">{{ $cliente['empresa'] }}</span>
                                                </h1>
                                                <p class="text-sm text-gray-400">Datos de contacto: <span class="text-sm text-gray-500 ">{{ $cliente['correo'] }} </span>, número telefónico <span class="text-sm text-gray-500 ">{{ $cliente['telefono'] }} </span>.</p>

                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </figcaption>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
   
    <script type="text/javascript">
        var frasesInspiradoras = [
            "La perseverancia es la clave del éxito. 🚀",
            "El único modo de hacer un gran trabajo es amar lo que haces. ❤️",
            "La vida es lo que pasa mientras estás ocupado haciendo otros planes. 🌍",
            "El éxito es 99% fracaso. 💪",
            "Cree que puedes y estás a medio camino. 🌟",
            "La única manera de hacer un gran trabajo es amar lo que haces. 💼",
            "Nunca te rindas. Grandes cosas llevan tiempo. ⏳",
            "El éxito no es la clave de la felicidad. La felicidad es la clave del éxito. Si amas lo que haces, tendrás éxito. 😊",
            "La oportunidad puede encontrar a aquellos que están listos. 🚪",
            "El único lugar donde el éxito viene antes que el trabajo es en el diccionario. 📖",
            "La única limitación es la que te pones a ti mismo. 🚫",
            "Haz hoy lo que otros no quieren, haz mañana lo que otros no pueden. 🌅",
            "Cada logro comienza con la decisión de intentarlo. 👣",
            "El único modo de hacer un gran trabajo es amar lo que haces. 💖",
            "No importa lo lento que vayas, siempre y cuando no te detengas. 🏃‍♂️",
            "La vida es 10% lo que nos pasa y 90% cómo reaccionamos ante ello. 🤔",
            "El éxito es la suma de pequeños esfuerzos repetidos día tras día. 🌟",
            "La magia está en ti. ✨",
            "No busques el éxito. Busca ser valioso y el éxito vendrá naturalmente. 🌱",
            "La disciplina es el puente entre metas y logros. 🌉"
        ];


        function obtenerFraseAleatoria() {
            var indiceAleatorio = Math.floor(Math.random() * frasesInspiradoras.length);
            return frasesInspiradoras[indiceAleatorio];
        }

        document.addEventListener("DOMContentLoaded", function() {
            var fraseMostrada = document.getElementById("fraseMostrada");
            fraseMostrada.textContent = obtenerFraseAleatoria();
        });

        var preguntas = [
            "¿Cuál es tu mayor logro hasta ahora? 🏆",
            "¿Qué aprendizaje importante obtuviste hoy? 🧠",
            "¿En qué aspecto puedes mejorar? 💪",
            "¿Cuál es tu mayor miedo y cómo puedes superarlo? 😨",
            "¿Qué consejo te darías a ti mismo/a hace 5 años? 🕰️",
            "¿Cuál es tu objetivo más importante a corto plazo? 🥇",
            "¿Cómo defines el éxito? 🌟",
            "¿Qué actividades te dan más energía y cuáles te la quitan? ⚡",
            "¿Cuál es tu mayor fortaleza personal? 💪",
            "¿En qué situación te has sentido más orgulloso/a de ti mismo/a? 😊",
            "¿Qué hábito te gustaría desarrollar para mejorar tu vida? 🔄",
            "¿Qué te inspira y motiva en la vida? 🚀",
            "¿Cómo manejas el estrés y la presión? ⏳",
            "¿Cuál es tu mayor sueño o aspiración? 💭",
            "¿Cómo te visualizas a ti mismo/a en el futuro? 🔮",
            "¿Qué significa para ti vivir una vida significativa? ❤️",
            "¿Qué cambios pequeños puedes hacer hoy para mejorar tu mañana? 🌅",
            "¿Cuál es tu filosofía de vida? 🤔",
            "¿Qué te hace sentir agradecido/a en este momento? 🙏",
            "¿Qué lección importante has aprendido de un desafío reciente? 🚧",
        ];


        // Función para obtener una pregunta aleatoria
        function obtenerPreguntaAleatoria() {
            var indiceAleatorio = Math.floor(Math.random() * preguntas.length);
            return preguntas[indiceAleatorio];
        }

        // Función para mostrar la pregunta en el contenedor
        function mostrarPregunta() {
            var preguntaContainer = document.getElementById("question-container");
            preguntaContainer.textContent = obtenerPreguntaAleatoria();
        }

        // Llamada inicial para mostrar la primera pregunta al cargar la página
        mostrarPregunta();
    </script>
    
</body>

</html>