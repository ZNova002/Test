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
  <h1>Cập nhật danh mục</h1>
  <form action="/cap-nhat-danh-muc" method="post">
  <table>
     @csrf
    <tr>
      <td>ID</td>
      <td><input type="text" name="txt_id" value="{{$items[0]->Category_id}}" readonly> </td>  

    </tr>
    <tr>
      <td>Tên</td>
      <td><input type="text" name="txt_name" value="{{$items[0]->Category_name}}"></td> 
  
    </tr>
    <tr>
      <td>Mô tả</td>
      <td><input type="text" name="txt_description" value="{{$items[0]->Category_description}}"></td> 
  
    </tr>
    <tr>
      <td>
          <input type="submit" value="Cập nhật">
      </td>
    </tr>
  </table>
</form>
</div>

</body>
</html>
