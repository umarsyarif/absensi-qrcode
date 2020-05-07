<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('tambah.tu') }}" method="post">
        @csrf
    <label>Name :</label>
    <input type="text" name="name">
    <label>Identity :</label>
    <input type="text" name="identity">
    <label>pass :</label>
    <input type="password" name="password">
    <label>pas consf :</label>
    <input type="password" name="confirmation">
    <button type="submit">Simpan</button>
</form>
</body>
</html>