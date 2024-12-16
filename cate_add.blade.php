<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm danh mục</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h1>Thêm danh mục</h1>
  <form action="/them-danh-muc" method="post">
  <table>
     @csrf
     <tr>
      <td>Tên</td>
      <td><input type="text" name="txt_name" value=""></td> 
  
    </tr> 
    <tr>
      <td>Mô tả</td>
      <td><textarea name="txt_description"></textarea></td> 
  
    </tr>
    <tr>
      <td>
          <input type="submit" value="Thêm">
      </td>
    </tr>
  </table>
</form>
</div>

</body>
</html>
