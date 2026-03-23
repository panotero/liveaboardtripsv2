<head>

    <x-icon />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        LiveAboardTrips | {{ $slot }}
    </title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .schedule-overflow::-webkit-scrollbar {
            width: 5px;
        }

        .schedule-overflow::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .schedule-overflow::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>

    @vite('resources/js/client.js')

</head>
