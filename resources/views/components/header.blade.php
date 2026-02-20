<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/LiveAboardTrips Icon.png') }}">
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
