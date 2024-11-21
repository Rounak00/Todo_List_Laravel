<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Project</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:32px">
        @includeIf('common.nav')
        <h1>Products</h1>
    </div>
     <div class="container">
        @if($message=Session::get('success'))
          <div class ="alerts alert-success alert-block">
             <strong>{{$message}}</strong>
          </div>
        @endif
    </div>
    <div class="container">
  <p>All the prodcts that are in the database:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Name</th>
        <th>Image </th>
        <th>Action </th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{($loop->index)+1}}</td>
        <td>{{$product->name}}</td>
        <td><img src="product/{{$product->image}}" class="rounded-circle" width="30" height="30" alt="Product Iamge"></td>
        <td> 
             <a href="/edit/{{$product->id}}"><button>Edit</button></a>
             <a href="/delete/{{$product->id}}"><button>Delete</button></a>
             
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>