<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officials List PDF</title>
    <style>

    </style>
</head>
<body>
    <h1>Officialist</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>QR Code</th>
                <th>Position</th>
                <th>Name</th>
                <th>Jersey Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $players)
                <tr>
                    <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(50)->generate($players->id)) }}" alt="QR Code"></td>
                    <td>{{ $players->position }}</td>
                    <td>{{ $players->name }}</td>
                    <td>{{ $players->jersey_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
