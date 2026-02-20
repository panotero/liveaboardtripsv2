<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trips</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dive Paradise - Liveaboard Adventures</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.8s ease-out forwards;
        }

        .slideshow-item {
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>

<body class="bg-sky-50 text-gray-800">
    <x-navbar />
    <main class="max-w-7xl mx-auto px-4 py-8 pt-28  flex flex-col lg:flex-row gap-8">
        this is trips page
    </main>
</body>

</html>
