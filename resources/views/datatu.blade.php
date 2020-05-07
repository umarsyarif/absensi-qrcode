<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('tambah.tu') }}" type="submit">Tambah</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Identity</th>
            <th>Email</th>
        </tr>
        @foreach ($data_tu as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->identity }}</td>
            <td>{{ $row->email }}</td>    
        </tr>
        @endforeach
            
    </table>
    
</body>
</html>