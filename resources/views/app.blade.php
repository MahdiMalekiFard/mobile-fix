<!DOCTYPE html>
<html>
<head>
    <title>Vue Project</title>
    @routes
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @inertiaHead

    <style>
        @font-face {
            font-family: 'Vazirmatn';
            src: url('/fonts/vazir/Vazirmatn-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }

        body, button, input, select, textarea, div, span, p, a {
            font-family: 'Vazirmatn', Tahoma, sans-serif !important;
            font-feature-settings: "ss03" !important;
        }
    </style>
</head>
<body>
@inertia
</body>
</html>
