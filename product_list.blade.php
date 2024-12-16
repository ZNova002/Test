<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh sách sản phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container mt-3">
  <h1>Danh sách sản phẩm</h1>
  <h2><a href="them-san-pham">Thêm sản phẩm</a></h2>
  <table class="table table-striped table-hover">
    <tr>
      <th>Mã sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Danh mục</th>   
      <th>Sửa</th> 
    </tr>
    @foreach($items as $item)
    <tr>
      <td>{{$item->Product_id}}</td>
      <td>{{$item->Product_name}}</td> 
      <td>{{$item->Category_name}}</td> 
      <td><a href="thong-tin-san-pham/{{$item->Product_id}}"><img src="{{ asset('img/edit.png') }}" width="40"></a>
          <a href="xoa-san-pham/{{$item->Product_id}}"><img src="{{ asset('img/del.png') }}" width="40"></a>
      </td>  
    </tr>
    @endforeach
  </table>
</div>

</body>
</html>
