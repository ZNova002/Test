<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh sách</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container mt-3">
  <h1>Dach sách người dùng</h1>
  <h2><a href="them-nguoi-dung">Thêm người dùng</a></h2>
  <table class="table table-striped table-hover">
    <tr>
      <th>ID</th>
      <th>Name</th>  
      <th>Edit</th> 
    </tr>
    @foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->username}}</td> 
      <td><a href="thong-tin-nguoi-dung/{{$user->id}}"><img src="{{ asset('img/edit.png') }}" width="40"></a>
          <a href="xoa-nguoi-dung/{{$user->id}}"><img src="{{ asset('img/del.png') }}" width="40"></a>
      </td>  
    </tr>

    @endforeach
  </table>
</div>

</body>
</html>
