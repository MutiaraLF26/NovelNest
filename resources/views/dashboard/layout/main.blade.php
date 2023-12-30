<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Document</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        @include('dashboard.layout.navbar')
        <main>
            <div>
                @yield('container')
            </div>
        </main>
        
        @include('dashboard.layout.footer')
        
    </div>
    {{-- <script>
        let currentParagraph = 0;
        const paragraphs = document.querySelectorAll('#novel-content > p');

        function showParagraph(index) {
            paragraphs.forEach((paragraph, i) => {
                paragraph.style.display = i === index ? 'block' : 'none';
            });
        }

        function changeParagraph(direction) {
            currentParagraph += direction;

            if (currentParagraph < 0) {
                currentParagraph = 0;
            } else if (currentParagraph >= paragraphs.length) {
                currentParagraph = paragraphs.length - 1;
            }

            showParagraph(currentParagraph);
        }

        // Show the first paragraph initially
        showParagraph(currentParagraph);
    </script> --}}
</body>
</html>