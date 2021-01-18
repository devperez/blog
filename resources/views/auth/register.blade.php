<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:80px">
            <div class="col-md-6 col-md-offset-4">
                <h4>User register</h4>
                <hr />
                <form action="{{route('auth.create')}}" method="POST">
                    @csrf
                    <div class="results">
                        @if(Session::get('success'))
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                        @endif
                    </div>
                    <div>
                     @if(Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your full name" value="{{old('name')}}">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Register</button>
                    </div>
                    <br />
                    <a href="login">I already have an account!</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>