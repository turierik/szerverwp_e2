<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="container mx-auto">
        <div class="grid grid-cols-4 gap-3">
            <div class="col-span-3">
                @yield('content')
            </div>
            <div>Sidebar.</div>
        </div>
    </div>
</body>
</html>
