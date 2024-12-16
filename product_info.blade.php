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
  <h1>Cập nhật sản phẩm</h1>
  <form action="/cap-nhat-san-pham" method="post" enctype="multipart/form-data">
  <table>
     @csrf
    <tr>
      <td>ID</td>
      <td><input type="text" name="txt_id" value="{{$item[0]->Product_id}}" readonly> </td>  

    </tr>
    <tr>
      <td>Tên</td>
      <td><input type="text" name="txt_name" value="{{$item[0]->Product_name}}"></td> 
    </tr>
    <tr>
      <td>Ảnh</td>
      <td><img src="{{@$item[0]->Product_img}}" width="100">
        <input type="file" name="txt_img" value="{{@$item[0]->Product_img}}">
        <input type="hidden" name="txt_img_old" value="{{@$item[0]->Product_img}}"></td> 
  
    </tr>
    <tr>
      <td>Danh mục </td>
      <td>
          <select name="txt_category">
          <?php
              foreach($categories as $category)
              {
                if(($category->Category_id == $item[0]->Product_cate))
                  echo"<option value='$category->Category_id' selected>$category->Category_name</option>";
                else
                  echo"<option value='$category->Category_id'>$category->Category_name</option>";
              }
          ?>

          </select>

      </td> 
    </tr> 
    <tr>
      <td>Mô tả</td>
      <td><input type="text" name="txt_description" value="{{$item[0]->Product_description}}"></td> 
  
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
