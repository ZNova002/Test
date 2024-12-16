<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sach nguoi dung</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .alert {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c82333;
        }

        .action-buttons {
            display: flex;
            gap: 10px; /* */
        }
    </style>
</head>
<body>
    <h1>Danh Sach muc hang</h1>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>description</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ( $items as $category)
            <tr>
                <td>{{  $category->Category_id }}</td>
                <td>{{  $category->Category_name }}</td>
                <td>{{  $category->Category_description }}</td>
                <td><a href="thong-tin-danh-muc/{{$category->Category_id}}"><img src="{{ asset('img/edit.png') }}" width="40"></a>
          <a href="xoa-danh-muc/{{$category->Category_id}}"><img src="{{ asset('img/del.png') }}" width="40"></a>
      </td>  
            </tr>
            @endforeach
            </tbody>
    </table>
               
</body>
</html>
