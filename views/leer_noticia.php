<?php
require_once('../src/php/connect.php');

// Crea una instancia de la clase conexión
$conexion_instancia = new conexion;

// Verifica si se proporcionó un título en la URL
if (isset($_GET['titulo'])) {
    // Recupera el título de la URL y decodifica cualquier URL encoding
    $titulo = urldecode($_GET['titulo']);

    // Realiza la consulta a la base de datos para obtener el registro con el título proporcionado
    // (Asegúrate de usar las funciones adecuadas según tu sistema de gestión de base de datos)
    $sql = "SELECT * FROM tblblog WHERE titulo = ?";
    $stmt = $conexion_instancia->getConexion()->prepare($sql);
    $stmt->bind_param("s", $titulo);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    // Maneja el caso en el que no se proporcionó un título en la URL
    echo 'No se proporcionó un título en la URL.';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ladco Steel | Industria Metalmecánica</title>
    <link rel="shortcut icon" href="../src/image/logoPagina.webp" />
    <meta name="description"
        content="Descubre la excelencia en mobiliario metálico con Ladco Steel. Diseño duradero y elegante para transformar tu espacio. ¡Explora ahora!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="mobiliario metálico, muebles de acero, diseño industrial, mobiliario resistente, muebles modernos, muebles comerciales, mobiliario duradero, acabados en acero, diseño contemporáneo, muebles de calidad, mesas de acero, sillas metálicas, estanterías de metal, escritorios industriales, gabinetes de acero, decoración en metal, muebles para oficinas, mobiliario para tiendas, muebles para espacios comerciales, diseño exclusivo, fabricación de acero, personalización de muebles, estilos modernos, tendencias en mobiliario, muebles robustos, sofisticación en acero, mobiliario versátil, elegancia industrial, mesas de conferencia de acero, mobiliario de almacenamiento, mobiliario contemporáneo, diseño minimalista, calidad y durabilidad, estilo único en acero, sillas para restaurantes, mobiliario para hostelería, decoración industrial, mesas auxiliares de metal, mobiliario de exterior, mobiliario para salas de espera, mesas de centro de acero, diseño de interiores con acero, estilos vanguardistas, mobiliario personalizado, tendencias en decoración, calidad artesanal, diseño funcional en acero">
    <meta name="robots" content="index, follow">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <meta http-equiv="Content-Security-Policy" content="script-src 'self';">
    <meta http-equiv="Content-Security-Policy" content="object-src 'none';">
</head>

<body>
    <header class="sticky top-0 z-50">
        <nav class=" bg-neutral-700 bg-opacity-100 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1695747298465-1ab46f753740?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1932&q=80')]  bg-blend-multiply text-lg shadow-lg	">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="../index.html" class="flex items-center">
                    <img src="../src/image/logo.png" class="h-16 mr-3" alt="Ladco Steel Logo" />
                    <!--<span class="self-center text-2xl font-semibold whitespace-nowrap ">Ladco</span>-->
                </a>
                <div class="flex items-center md:order-2">
                    <!--<button type="button" data-dropdown-toggle="language-dropdown-menu"
                        class="inline-flex items-center font-medium justify-center px-4 py-2 text-lg text-amber-300 rounded-lg cursor-pointer hover:bg-neutral-600">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                            preserveAspectRatio="xMidYMid meet">
                            <path fill="#FBD116" d="M32 5H4a4 4 0 0 0-4 4v9h36V9a4 4 0 0 0-4-4z"></path>
                            <path fill="#22408C" d="M0 18h36v7H0z"></path>
                            <path fill="#CE2028" d="M0 27a4 4 0 0 0 4 4h28a4 4 0 0 0 4-4v-2H0v2z"></path>
                        </svg>
                        Español (CO)
                    </button>

                     Dropdown lenguaje 
                    <div class="z-50 hidden my-4 text-base list-none bg-neutral-900 divide-y divide-gray-100 rounded-lg shadow "
                        id="language-dropdown-menu">
                        <ul class="py-2 font-medium" role="none">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-amber-300 hover:bg-neutral-950  "
                                    role="menuitem">
                                    <div class="inline-flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-2" viewBox="0 0 36 36"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                            preserveAspectRatio="xMidYMid meet">
                                            <path fill="#FBD116" d="M32 5H4a4 4 0 0 0-4 4v9h36V9a4 4 0 0 0-4-4z"></path>
                                            <path fill="#22408C" d="M0 18h36v7H0z"></path>
                                            <path fill="#CE2028" d="M0 27a4 4 0 0 0 4 4h28a4 4 0 0 0 4-4v-2H0v2z">
                                            </path>
                                        </svg>
                                        Español (CO)
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('locale/en') }}"
                                    class="block px-4 py-2 text-sm text-amber-300 hover:bg-neutral-950  "
                                    role="menuitem">
                                    <div class="inline-flex items-center">
                                        <svg aria-hidden="true" class="h-3.5 w-3.5  mr-2"
                                            xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                            viewBox="0 0 512 512">
                                            <g fill-rule="evenodd">
                                                <g stroke-width="1pt">
                                                    <path fill="#bd3d44"
                                                        d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                        transform="scale(3.9385)" />
                                                    <path fill="#fff"
                                                        d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                        transform="scale(3.9385)" />
                                                </g>
                                                <path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)" />
                                                <path fill="#fff"
                                                    d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                    transform="scale(3.9385)" />
                                            </g>
                                        </svg>
                                        English
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>-->
                    <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-transparent focus:outline-none focus:ring-2" aria-controls="navbar-language" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                    <a href="login.html">
                        <button type="button" class="inline-flex items-center font-medium justify-center px-4 py-2 text-lg text-amber-300 rounded-lg cursor-pointer hover:bg-neutral-600">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 32.000000 32.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,32.000000) scale(0.100000,-0.100000)" stroke="none">
                                    <path d="M112 247 c-26 -27 -28 -54 -6 -85 14 -20 14 -23 -1 -28 -27 -11 -58 -84 -35 -84 6 0 10 6 10 14 0 8 8 24 18 36 16 20 19 21 31 6 17 -20 45 -20 62 0 12 15 15 14 31 -6 10 -12 18 -28 18 -36 0 -8 5 -14 10 -14 23 0 -8 73 -35 84 -15 5 -15 8 -1 28 22 32 20 61 -7 86 -30 28 -68 28 -95 -1z m82 -13 c31 -30 9 -84 -34 -84 -24 0 -50 26 -50 50 0 24 26 50 50 50 10 0 26 -7 34 -16z m-22 -116 c-9 -9 -15 -9 -24 0 -9 9 -7 12 12 12 19 0 21 -3 12 -12z" />
                                </g>
                            </svg>

                        </button>
                    </a>
                </div>

                <div class="items-center justify-between md:bg-transparent hidden w-full md:flex md:w-auto md:order-1" id="navbar-language">
                    <ul class="flex flex-col font-medium  p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0">
                        <li>
                            <a href="/" class="block py-2 pl-3 pr-4  text-amber-300 rounded  md:hover:text-amber-500 md:p-0 font-normal">Inicio</a>
                        </li>
                        <li>
                            <a href="views/nosotros.html" class="block py-2 pl-3 pr-4 text-amber-300 rounded  md:hover:text-amber-500 md:p-0 font-normal">Nosotros</a>
                        </li>
                        <li>
                            <a href="noticias.php
" class="block py-2 pl-3 pr-4 text-amber-300 rounded  md:hover:text-amber-500 md:p-0 font-normal">Noticias
                            </a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-amber-300 font-normal transition duration-300  md:hover:text-amber-500 md:p-0 md:w-auto">Productos
                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="z-10 hidden  font-normal bg-neutral-950 divide-y divide-gray-100 rounded-lg shadow w-44  ">
                                <ul class="py-2 text-lg text-gray-700  " aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Producto
                                            1</a>
                                    </li>
                                    <li aria-labelledby="dropdownNavbarLink">
                                        <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Multilevel<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg></button>
                                        <div id="doubleDropdown" class="z-10 hidden bg-neutral-950 divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                            <ul class="py-2 text-lg text-gray-700  md:bg-neutral-950" aria-labelledby="doubleDropdownButton">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Ejemplo
                                                        1</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="block px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Ejemplo
                                                        2</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="block px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Ejemplo
                                                        3</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="block px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Ejemplo
                                                        4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Ejemplo
                                            5</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-amber-300 font-normal transition duration-300 md:hover:text-amber-500 hover:bg-zinc-900 ">Ejemplooo</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="views/contacto.html" class="block py-2 pl-3 pr-4 text-amber-300 rounded  md:hover:text-amber-500 md:p-0 font-normal">Contáctenos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v18.0" nonce="bBky7thP"></script>
        <!-- Header -->
        <?php


        // Verifica si se encontró un registro
        if ($row = $resultado->fetch_assoc()) {
            // Muestra la información del registro
            $id = $row['id'];
            $titulo = $row['titulo'];
            $parrafoPrincipal = $row['parrafoPrincipal'];
            $parrafoSecundario = $row['parrafoSecundario'];
            $imagenFondo = $row['imagenFondo'];
            // Elimina los primeros tres caracteres del path de la imagen
            $imagenFondo = substr($imagenFondo, 3);
            $imagenPrincipal = $row['imagenPrincipal'];
            $imagenPrincipal = substr($imagenPrincipal, 3);
            $imagenSecundaria = $row['imagenSecundaria'];
            $imagenSecundaria = substr($imagenSecundaria, 3);
            $creadoEn = $row['creado_en']


        ?>
            <div class="relative w-full h-96">
                <img src="<?php echo $imagenFondo ?>" alt="<?php echo $titulo; ?>" class="w-full h-full object-cover">
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="w-full h-fit md:w-8/12 mx-auto pt-5">
                        <div class="w-full h-14 flow-root p-4">
                            <p class="float-left text-xs lg:text-lg text-white font-semibold">
                                <?php echo $creadoEn; ?>
                            </p>
                            <a href="noticias.php">
                                <button type="button" class="w-auto flex items-center float-right justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto">
                                    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                    </svg>
                                    <span>Volver</span>
                                </button>
                            </a>
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-bold text-white text-center mt-12"><?php echo $titulo; ?></h1>
                    </div>
                </div>
            </div>



            <!-- Contenido-->
            <div class="w-full lg:w-8/12 h-fit mx-auto py-16 px-4 ">
                <div class="grid grid-flow-col">
                    <!--Columna izq-->
                    <div class="col-span-1 flow-root lg:w-64">
                        <p class="text-base text-slate-500 ">Compartir</p>
                        <!--Facebook pagina
                                        <div class="fb-share-button" data-href="https://www.ladcosteel.com.co/" data-layout="" data-size=""><a
                                                target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.ladcosteel.com.co%2F&amp;src=sdkpreparse"
                                                class="fb-xfbml-parse-ignore">Compartir</a></div>-->
                        <!--Facebook propio AGREGARLE LA S A HTTP -->
                        <?php
                        // Obtener la URL base del sitio
                        $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

                        // Obtener la URL completa incluyendo la ruta
                        $current_url = $base_url . $_SERVER['REQUEST_URI'];
                        ?>

                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>&amp;src=sdkpreparse">
                            <button type="button" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-full text-sm px-3 py-3 text-center inline-flex items-center mr-2 my-4">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </a>
                        <!--<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F{ str_replace('http://', '', Request::url()) }%2F&amp;src=sdkpreparse">asasd
                                            </a>-->

                    </div>
                    <!--Columna der-->
                    <div class="col-span-4 text-slate-500 overflow-hidden">
                        <p><?php echo $parrafoPrincipal ?></p>
                        <img class="rounded-t-lg lg:max-w-2xl mx-auto mt-12 " src="<?php echo $imagenPrincipal ?>" alt="" />
                        <p class="mt-12"><?php echo $parrafoSecundario ?></p>
                        <img class="rounded-t-lg lg:max-w-2xl mx-auto mt-12 " src="<?php echo $imagenSecundaria ?>" alt="" />
                    </div>

                </div>
            </div>
        <?php

        } else {
            // Maneja el caso en el que no se encuentra el registro
            echo 'No se encontró el registro.';
        }

        // Cierra la conexión y libera los recursos
        $stmt->close();
        ?>
        <button id="to-top-button" onclick="goToTop()" title="Go To Top" class="hidden fixed z-90 bottom-8 right-8 border-0 w-16 h-16 rounded-full drop-shadow-md bg-amber-500 text-white text-3xl font-bold">&uarr;</button>
        <script>
            var toTopButton = document.getElementById("to-top-button");

            // When the user scrolls down 200px from the top of the document, show the button
            window.onscroll = function() {
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    toTopButton.classList.remove("hidden");
                } else {
                    toTopButton.classList.add("hidden");
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function goToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        </script>
    </main>
    <button id="to-top-button" onclick="goToTop()" title="Go To Top" class="hidden fixed z-90 bottom-8 right-8 border-0 w-16 h-16 rounded-full drop-shadow-md bg-amber-500 text-white text-3xl font-bold">&uarr;</button>
    <footer class="bg-neutral-900 bg-opacity-100 bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1668456186589-a182ed97df44?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1932&q=80')]  bg-blend-multiply">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">

                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-amber-300 uppercase ">Nosotros</h2>
                        <ul class="text-slate-300  font-medium">
                            <li class="mb-4">
                                <a href="nosotros.html" class="hover:underline">Historia</a>
                            </li>
                            <li>
                                <a href="views/noticias.php
    " class="hover:underline">Noticias
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-amber-300 uppercase ">Siguenos</h2>
                        <ul class="text-slate-300  font-medium">
                            <li class="mb-4">
                                <a href="https://github.com/themesberg/flowbite" class="hover:underline ">LinkedIn</a>
                            </li>
                            <li>
                                <a href="contacto.html" class="hover:underline">Contacto</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-amber-300 uppercase ">Legal</h2>
                        <ul class="text-slate-300  font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Términos y Condiciones</a>
                            </li>
                            <!--<li>
                                <a href="#" class="hover:underline">Terminos &amp; Condiciones</a>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-slate-300 sm:text-center ">© 2023 <a href="" class="hover:underline">Ladco
                        Steel S.A.S</a>. Todos los derechos reservados.
                </span>
                <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
                            <path d="M41,4H9C6.243,4,4,6.243,4,9v32c0,2.757,2.243,5,5,5h32c2.757,0,5-2.243,5-5V9C46,6.243,43.757,4,41,4z M37.006,22.323 c-0.227,0.021-0.457,0.035-0.69,0.035c-2.623,0-4.928-1.349-6.269-3.388c0,5.349,0,11.435,0,11.537c0,4.709-3.818,8.527-8.527,8.527 s-8.527-3.818-8.527-8.527s3.818-8.527,8.527-8.527c0.178,0,0.352,0.016,0.527,0.027v4.202c-0.175-0.021-0.347-0.053-0.527-0.053 c-2.404,0-4.352,1.948-4.352,4.352s1.948,4.352,4.352,4.352s4.527-1.894,4.527-4.298c0-0.095,0.042-19.594,0.042-19.594h4.016 c0.378,3.591,3.277,6.425,6.901,6.685V22.323z">
                            </path>
                        </svg>
                        <span class="sr-only">TikTok</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 ">



                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M 7.5 5 C 6.132813 5 5 6.132813 5 7.5 L 5 24.5 C 5 25.867188 6.132813 27 7.5 27 L 24.5 27 C 25.867188 27 27 25.867188 27 24.5 L 27 7.5 C 27 6.132813 25.867188 5 24.5 5 Z M 7.5 7 L 24.5 7 C 24.785156 7 25 7.214844 25 7.5 L 25 24.5 C 25 24.785156 24.785156 25 24.5 25 L 7.5 25 C 7.214844 25 7 24.785156 7 24.5 L 7 7.5 C 7 7.214844 7.214844 7 7.5 7 Z M 10.4375 8.71875 C 9.488281 8.71875 8.71875 9.488281 8.71875 10.4375 C 8.71875 11.386719 9.488281 12.15625 10.4375 12.15625 C 11.386719 12.15625 12.15625 11.386719 12.15625 10.4375 C 12.15625 9.488281 11.386719 8.71875 10.4375 8.71875 Z M 19.46875 13.28125 C 18.035156 13.28125 17.082031 14.066406 16.6875 14.8125 L 16.625 14.8125 L 16.625 13.5 L 13.8125 13.5 L 13.8125 23 L 16.75 23 L 16.75 18.3125 C 16.75 17.074219 16.996094 15.875 18.53125 15.875 C 20.042969 15.875 20.0625 17.273438 20.0625 18.375 L 20.0625 23 L 23 23 L 23 17.78125 C 23 15.226563 22.457031 13.28125 19.46875 13.28125 Z M 9 13.5 L 9 23 L 11.96875 23 L 11.96875 13.5 Z">
                            </path>
                        </svg>
                        <span class="sr-only">LinkedIn</span>
                    </a>
                    <!--
                    <a href="#" class="text-gray-500 hover:text-gray-900 ">

                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble</span>
                    </a>
                    -->
                </div>
            </div>
        </div>
    </footer>
    <script>
        var toTopButton = document.getElementById("to-top-button");

        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function goToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    <script type="text/javascript">
        // options with modified interval
        const options = {
            defaultPosition: 1,
            interval: 5000, // Intervalo en milisegundos (3 segundos)

            // callback functions
            onNext: () => {
                console.log('next slider item is shown');
            },
            onPrev: () => {
                console.log('previous slider item is shown');
            },
            onChange: () => {
                console.log('new slider item has been shown');
            },
        };

        // instance options object
        const instanceOptions = {
            id: 'carousel-example',
            override: true
        };

        // Crear una nueva instancia de Carrusel con las opciones proporcionadas
        const carousel = new Carousel(carouselElement, items, options, instanceOptions);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>