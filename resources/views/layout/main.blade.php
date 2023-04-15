<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ url('css/select.min.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    {{-- Data Table --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <!-- stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

    {{-- FlowBite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <style>
        .surat {
            height: 55px;
        }

        .data {
            height: 210px;
        }

        .master {
            background: rgb(51 65 85);
            color: white;
            text-shadow: 0 0 1px gray;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans antialiased">
    <x-sidebar></x-sidebar>
    <main>
        {{ $slot }}
    </main>
    <x-footer></x-footer>

    <!-- script Material Tailwindcss -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
    <script
    type="module"
    src="https://unpkg.com/@material-tailwind/html@latest/scripts/popover.js"
    ></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

    {{-- Flow Bite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    {{-- DatePicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>

    <script src="{{ url('js/select.min.js') }}"></script>
    <script>
        $('#master').on('click', function() {
            $(this).toggleClass('master')
            $('#surat').toggleClass('surat')
        })

        $('#data_master').on('click', function() {
            $(this).toggleClass('master')
            $('#data').toggleClass('data')
        })

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2()
        })

        setTimeout(() => {
            $('#alert').css('display', 'none')
        }, 3000);
    </script>
</body>

</html>
