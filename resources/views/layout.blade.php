<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- เพิ่ม CSS สำหรับ font Kanit -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- เพิ่ม Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body class="bg-white font-sans antialiased">
    <nav class="bg-gray-900 flex justify-between items-center py-3">
        <div class="container mx-auto px-6 flex items-center">
            <a href="/" class="text-white">วิทยาลัยการอาชีพบ้านโฮ่ง</a>
            <div class="md:hidden ml-auto">
                <button type="button" class="text-gray-400 hover:text-white focus:outline-none focus:text-white"
                    aria-label="Toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd"
                            d="M4 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 5h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 5h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="hidden md:flex items-center ml-auto">
                <a href="/" class="text-white ml-5">หน้าแรก</a>
                <a href="/blog" class="text-white ml-5">บทความทั้งหมด</a>
                <a href="/create" class="text-white ml-5">เขียนบทความ</a>
                <a href="/about" class="text-white ml-5">เกี่ยวกับเรา</a>
                
            </div>
        </div>

        <div class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">BHIC</a>
                <a href="/" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">หน้าแรก</a>
                <a href="/blog" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">บทความทั้งหมด</a>
                <a href="/create" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">เขียนบทความ</a>
                <a href="/about" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">เกี่ยวกับเรา</a>
                
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-2">
        @yield('content')
    </div>
</body>

</html>
