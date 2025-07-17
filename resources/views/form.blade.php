<!doctype html>
<html lang="en">
  <head>
    <title>Form Submission</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <form action="{{url('/')}}/register" method="post">
            @csrf
            <!-- <pre>
                @php
                print_r($errors->all());
                @endphp
            </pre> -->
            @php 
                // send any variable to the component 
                $demo = 1;
            @endphp
            <div class="container">
                <h1 class="text-center">Registration</h1>
                
                <!-- Form without component -->
                <!-- <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{old('name')}}" type="text" name="name" class="form-control" id="name" aria-describedby="textHelp" placeholder="Enter name">
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input value="{{old('email')}}" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    <span class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                    <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="Confirm your Password">
                    <span class="text-danger">
                        @error('password1')
                            {{$message}}
                        @enderror
                    </span>
                </div> -->
                <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->


                <!-- Form using Component  -->

                
                 <x-input type="text" name="name" label="Name" placeholder="Enter your name" :demo="$demo"/>
                 <x-input type="email" name="email" label="Email" placeholder="Enter your email"/>
                 <x-input type="password" name="password" label="Password" placeholder="Enter your password"/>
                 <x-input type="password" name="password_confirmation" label="Confirm Password" placeholder="Re-enter your password"/>


                <button type="submit" class="btn btn-warning">Register</button>
            </div>
        </form>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>