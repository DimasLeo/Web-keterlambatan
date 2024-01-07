<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Kelayakan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9pBMrDmxDZOu5Bu6eg1w2eGw8A1fXhP7YO05nd2TNsiNXI6cUzEd8w5iK6ZwKlsyoZ/YuizETl/Efgl2U5r+eg==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <div id="navbar" class="h-full w-64 fixed top-0 left-[-250px] bg-gray-800 overflow-x-hidden transition duration-500 ease-in-out pt-20 text-white ">
        
        <div onclick="toggleNavbar()" class="flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out transform hover:bg-gray-900 hover:scale-105 cursor-pointer">         
            <i class="ri-layout-grid-fill"></i>
               <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Dashboard</a>
            </li>
        </div>
        
        
        <div class="flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out transform hover:bg-gray-900 hover:scale-105" id="navbarToggle">
            <div class="flex w-full items-center">
                <i class="ri-contacts-book-2-fill"></i>
                <span class="text-[15px] ml-4 text-gray-200">Data Master</span>

            </div>
        </div>
        
        <div class="text-left text-sm mt-2 w-4/5 mx-auto pl-10" id="submenu">
            <ul>
                <li class="flex rounded-lg transition duration-300 ease-in-out transform hover:bg-gray-900 hover:scale-105 p-3 text-md items-center gap-2">
                    <i class="ri-git-repository-fill"></i>
                    <a href="{{ route('rombel.index') }}" class="text-white">Data Rombel</a>
                </li>
                <li class="flex rounded-lg transition duration-300 ease-in-out transform hover:bg-gray-900 hover:scale-105 p-3 text-md items-center gap-2">
                    <i class="ri-git-repository-fill"></i>
                    <a href="{{ route('rayon.index') }}" class="text-white">Data Rayon</a>
                </li>
                <li class="flex rounded-lg transition duration-300 ease-in-out transform hover:bg-gray-900 hover:scale-105 p-3 text-md items-center gap-2">
                    <i class="ri-git-repository-fill"></i>
                    <a href="{{ route('student.index') }}" class="text-white">Data Siswa</a>
                </li>
                <li class="flex rounded-lg transition duration-300 ease-in-out transform hover:bg-gray-900 hover:scale-105 p-3 text-md items-center gap-2">
                    <i class="ri-git-repository-fill"></i>
                    <a href="{{ route('user.index') }}" class="text-white">Data User</a>
                </li>
            </ul>
        </div>
        
        <div onclick="toggleNavbar()" class="flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out transform hover:bg-gray-900 hover:scale-105 cursor-pointer">
            <i class="ri-bookmark-fill"></i>         
            <a href="{{ route('late.index')}}" class="ml-4 text-decoration-none text-white">Data Keterlambatan</a>
        </div>

        <div class="absolute w-full bottom-0 bg-gray-900 p-3 flex items-center justify-between">
            <div class="justify-start flex items-center">
                <p>Dimas Leo</p>
            </div>
            <div class="justify-end flex items-center">
                <a href="#" onclick="toggleNavbar()"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Toggle Button -->

    <div id="header" class="ml-64 p-5 bg-white flex items-center justify-between">
        <div class="flex items-center">
            <button id="toggleButton" onclick="toggleNavbar()" class="text-gray-900 text-2xl bg-transparent border-none mr-4">☰</button>
            <!-- <h2 class="text-2xl font-bold">Page Header</h2> -->
        </div>
        <div class="text-right" id="tanggalHariIni"></div>
    </div>


    <!-- Content Section -->
    <div id="content" class="ml-64 p-8">
        @yield('content')
    </div>


    <script>

        function getFormattedDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            const formattedDate = today.toLocaleDateString('en-US', options);
        
            // Memisahkan komponen tanggal
            const [weekday, month, day, year] = formattedDate.split(' ');
        
            // Menggabungkan ulang dengan tata letak yang diinginkan
            const customLayout = `${weekday} ${day} ${month} ${year}`;
        
            return customLayout;
        }

        console.log(getFormattedDate());
        
        document.getElementById('tanggalHariIni').textContent = getFormattedDate();

        function toggleNavbar() {
            const navbar = document.getElementById('navbar');
            const content = document.getElementById('content');
            const header = document.getElementById('header');
    
            if (navbar.style.left === '-250px') {
                navbar.style.left = '0';
                content.style.marginLeft = '250px';
                header.style.marginLeft = '250px';
            } else {
                navbar.style.left = '-250px';
                content.style.marginLeft = '0';
                header.style.marginLeft = '0';
            }
        }

        const navbarToggle = document.getElementById('navbarToggle');
        const submenu = document.getElementById('submenu');
    
        navbarToggle.addEventListener('click', () => {
            if (submenu.style.display === 'none') {
                submenu.style.display = 'block';
            } else {
                submenu.style.display = 'none';
            }
        });

    </script>
    
</body>
</html>