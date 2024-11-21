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
        <h1>Update Product {{$product->id}}</h1>
    </div>
    <div class="container">
        @if($message=Session::get('success'))
          <div class ="alerts alert-success alert-block">
             <strong>{{$message}}</strong>
          </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="form-group" >
                        <label>
                            Name
                        </label>
                        <input type="text" class="form-control"  name="name" value="{{old('name',$product->name)}}"/>
                        @if($errors->has('name'))
                           <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <textarea class="form-control" rows="4" name="description" value="{{$product->description}}">{{$product->description}}</textarea>
                        @if($errors->has('description'))
                           <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>
                           Image
                        </label>
                        <input type="file" name="image" class="form-control" value="{{old('image',$product->image)}}"/>
                         @if($errors->has('image'))
                           <span class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>