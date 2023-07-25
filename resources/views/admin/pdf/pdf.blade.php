<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Dados do Registro</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $dados['id'] }}</td>
        </tr>
        <tr>
            <th>TIPOLEI</th>
            <td>{{ $dados['tipolei'] }}</td>
        </tr>
        <tr>
            <th>DECRETOALTERACAOORCAMENTARIA</th>
            <td>{{ $dados['decretoalteracaoorcamentaria'] }}</td>
        </tr>
        <tr>
            <th>DATAATO</th>
            <td>{{ $dados['dataato'] }}</td>
        </tr>
        <tr>
            <th>DATAPUBLICACAO</th>
            <td>{{ $dados['datapublicacao'] }}</td>
        </tr>
        <tr>
            <th>TIPOATO</th>
            <td>{{ $dados['tipoato'] }}</td>
        </tr>
        <tr>
            <th>TIPOCREDITO</th>
            <td>{{ $dados['tipocredito'] }}</td>
        </tr>
        <tr>
            <th>TIPORECURSO</th>
            <td>{{ $dados['tiporecurso'] }}</td>
        </tr>
        <tr>
            <th>SITUACAO</th>
            <td>{{ $dados['situacao'] }}</td>
        </tr>
        <tr>
            <th>VALORCREDITO</th>
            <td>{{ $dados['valorcredito'] }}</td>
        </tr>
        <tr>
            <th>CREATED_AT</th>
            <td>{{ $dados['created_at'] }}</td>
        </tr>
        <tr>
            <th>UPDATED_AT</th>
            <td>{{ $dados['updated_at'] }}</td>
        </tr>
    </table>
</body>
</html>
