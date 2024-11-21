<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Log in</title>
</head>
<body>
    <div class="container">
        <h1>Log in Form</h1>
        
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{route("user.login")}}">
                    @csrf 
                    <div class="form-group" >
                        <label>
                            Email
                        </label>
                        <input type="text" class="form-control"  name="email" required/>
                        
                    </div>
                    <div class="form-group">
                        <label>
                            Password
                        </label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    
                    <button type="submit" class="btn btn-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>