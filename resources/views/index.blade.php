<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Sketch App</title>
    <style>
        body {
            margin: 25px;
            font-family: verdana;
        }

        h1 {
            color: darkslategray;
        }

        p {
            font-size: 12pt;
            color: black;
        }

        canvas {
            height: 175px;
            border-style: solid;
            border-width: 1px;
            border-color: black;
        }

        input {
            font-family: verdana;
            font-size: 12pt;
        }
    </style>
</head>
<body>
    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*" required id="finput" onchange="upload()">
        <canvas id="canv1"></canvas>
        <button type="submit">Upload</button>
    </form>

    <script>
        function upload() {
            var imgcanvas = document.getElementById("canv1");
            var fileinput = document.getElementById("finput");
            
            // Check if a file is selected
            if (fileinput.files && fileinput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var image = new Image();
                    image.src = e.target.result;

                    image.onload = function () {
                        // Draw the image on the canvas
                        var ctx = imgcanvas.getContext("2d");
                        imgcanvas.width = image.width;
                        imgcanvas.height = image.height;
                        ctx.drawImage(image, 0, 0, image.width, image.height);
                    };
                };

                // Read the selected file as a data URL
                reader.readAsDataURL(fileinput.files[0]);
            }
        }
    </script>
</body>
</html>