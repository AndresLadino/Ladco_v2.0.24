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
                        <img src="../../src/image/logo.png" class="h-13 mr-3" alt="Ladco Steel Logo" />
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
        <div class="h-full top-0 pt-20 px-3  overflow-y-auto bg-neutral-950 dark:bg-gray-800">
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
                            <a href="../dashboard.php" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-slate-800 dark:text-white dark:hover:bg-gray-700">Gestión</a>
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
        <div class="bg-stone-100 h-screen">
            <!-- Alerta
        <div class="absolute top-20 right-0 m-4">
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md transition-opacity"
                role="alert" id="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">¡Listo!</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
-->
            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="w-full mb-1">
                    <div class="mb-4">

                        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                            <span class="underline underline-offset-3 decoration-8 decoration-amber-400">Gestionar
                                clientes
                            </span>
                        </h1>
                    </div>
                    <div class="sm:flex">
                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3"><!--data-modal-toggle="add-user-modal"-->
                            <a href="cliente/create">
                                <button class="relative inline-flex items-center justify-center w-2/2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-green-700 to-green-500 group-hover:from-green-700 group-hover:to-green-500 hover:text-white" type="button">
                                    <span class="relative flex items-center px-5 w-full py-2.5 transition-all ease-in duration-75 bg-green-500 text-white dark:bg-gray-900  group-hover:bg-opacity-0">
                                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Añadir cliente
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle p-4">

                        <div class="overflow-hidden shadow">

                            <?php
                            // Incluye el archivo de conexión
                            require_once('../../src/php/connect.php');

                            // Crea una instancia de la clase conexion
                            $conexion_instancia = new conexion;

                            // Consulta a la base de datos
                            $query = "SELECT * FROM tblclientes";
                            $resultado = $conexion_instancia->getConexion()->query($query);

                            // Verifica si la consulta se ejecutó correctamente
                            if ($resultado) {
                                // Procesa los resultados solo si hay al menos una fila
                                if ($resultado->num_rows > 0) {
                                    echo '<table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600" id="clientes">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-amber-500 uppercase dark:text-gray-400" hidden>
                                                ID
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-amber-500 uppercase dark:text-amber-400">
                                                Nombre
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-amber-500 uppercase dark:text-gray-400">
                                                Apellido
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                Telefono
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                Correo
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                Empresa
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">';

                                    while ($fila = $resultado->fetch_assoc()) {

                                        echo '
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="text-base pl-4 font-semibold text-gray-900 dark:text-white" hidden>
                                        ' . $fila['id'] . '
                                        </td>
                                        <td class="text-base pl-4 font-semibold text-gray-900 dark:text-white">
                                        ' . $fila['nombre'] . '
                                        </td>
                                        <td class="text-base font-semibold text-gray-900 dark:text-white">
                                        ' . $fila['apellido'] . '
                                        </td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ' . $fila['telefono'] . '
                                        </td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ' . $fila['correo'] . '
                                        </td>
                                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ' . $fila['empresa'] . '
                                        </td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">

                                            <button id="dropdownDefaultButton-{{ $cliente->id }}" data-dropdown-toggle="dropdown-{{ $cliente->id }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white hover:text-white dark:hover-text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400" type="button">
                                                <span class="relative flex items-center px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    Acciones
                                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdown-{{ $cliente->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
                                                <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton-{{ $cliente->id }}">
                                                    <li>
                                                        <a href="">
                                                            <button class="relative inline-flex items-center justify-center w-full  overflow-hidden text-sm font-medium text-gray-900  group bg-gradient-to-br from-amber-600 to-amber-300 group-hover:from-amber-600 group-hover:to-amber-300 hover:text-white  dark:focus:ring-red-400" type="button">
                                                                <span class="relative flex items-center px-5 w-full py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900  group-hover:bg-opacity-0">
                                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                                        </path>
                                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                                    </svg> Editar
                                                                </span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button data-cliente-id="{{ $cliente->id }}" data-modal-toggle="delete-user-modal" class="relative inline-flex items-center justify-center w-full overflow-hidden text-sm font-medium text-gray-900 rounded-b-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:focus:ring-red-400" type="button">

                                                            <span class="relative flex items-center px-5 w-full py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900  group-hover:bg-opacity-0">
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                                </svg> Eliminar
                                                            </span>
                                                        </button>
                                                    </li>


                                                </ul>
                                            </div>
                                        </td>
                                    </tr>';
                                    }

                                    echo "</tbody>
                                    </table>";

                                    // Libera los resultados
                                    $resultado->free();
                                } else {
                                    echo '<p class="m-5 text-lg font-semibold text-gray-700 dark:text-gray-400">No hay resultados para mostrar. Por favor, inserte registros.</p>';
                                }
                            } else {
                                // Manejo de errores si la consulta falla
                                die('<p class="m-5 text-lg font-semibold text-gray-700 dark:text-gray-400">Error en la consulta: ' . $conexion_instancia->getConexion()->error . '</p>');
                            }

                            // Cierra la conexión después de usarla
                            $conexion_instancia->getConexion()->close();
                            ?>



                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Delete User Modal -->
            <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="delete-user-modal">
                <div class="relative w-full h-full max-w-md px-4 md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-slate-800 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="delete-user-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 pt-0 text-center">
                            <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mt-5 mb-6 text-lg text-neutral-800 dark:text-gray-400">¿Desea eliminar el cliente?</h3>
                            <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" id="delete-client-id" name="delete-client-id" value="">
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                                    Segurísimo
                                </button>
                                <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-modal-toggle="delete-user-modal">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
            <script type="text/javascript" src="https://cdn.tailwindcss.com/"></script>

            <script type="text/javascript">
                $('#clientes thead th').css('background-color', 'rgb(10 10 10)');
                $('#clientes thead th').css('color', 'rgb(252 211 77)')
                new DataTable('#clientes', {
                    "oLanguage": {
                        "sInfo": "Mostrando <span class='font-bold'>(_START_-_END_)</span> de <span class='font-bold'>_TOTAL_</span>",
                        "oPaginate": {
                            "sNext": "<p class='text-white'>.</p> <svg class='w-6 h-6 ' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path fill-rule='evenodd' d='M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z' clip-rule='evenodd'></path> </svg>",
                            "sPrevious": "<p class='text-white'>.</p> <svg class='w-5 h-5 ' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path fill-rule='evenodd' d='M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z' clip-rule='evenodd'></path></svg> "
                        },

                    },
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',

                    },
                });
            </script>
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    const deleteButtons = document.querySelectorAll("[data-modal-toggle='delete-user-modal']");
                    const deleteForm = document.getElementById("delete-user-form");
                    const deleteClientId = document.getElementById("delete-client-id");

                    deleteButtons.forEach((button) => {
                        button.addEventListener("click", function(event) {
                            event.preventDefault();
                            const clientId = this.getAttribute("data-cliente-id");
                            deleteClientId.value = clientId;

                            // Código para mostrar el modal aquí (puedes agregar tu lógica para mostrar el modal)
                        });
                    });
                });
            </script>
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    var alert = document.getElementById("alert");

                    setTimeout(function() {
                        // Agrega una clase "ocultar" al elemento para ocultarlo
                        alert.style.display = "none";

                    }, 4000); // 4000ms = 4 segundos
                });
            </script>
        </div>
    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>