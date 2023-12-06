<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Sketch Result</title>
</head>
<body>
    <h1>Original Image</h1>
    <img src="{{ asset('uploads/' . $imageName) }}" alt="Original Image">

    <h1>Pencil Sketch</h1>
    <img src="{{ asset('sketches/sketch_' . $imageName) }}" alt="Pencil Sketch">
</body>
</html>