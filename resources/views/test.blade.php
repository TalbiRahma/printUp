<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('produit-personnaliser-2') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="uploaded_file">
        <button type="submit">Télécharger</button>
    </form>
    
    @if (Session::has('image'))
        
        <img src="{{ $shirtImage->encode('data-url') }}" alt="" width="75%" height="75%">
    @else
        <img src="/uploads/T-shirt.jpg" alt="" width="75%" height="75%">
    @endif

</body>
</html>