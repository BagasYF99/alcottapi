<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login</title>
  </head>
    <body>
    
    <section class="vh-100 gradient-custom">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
        {{session()->get('error')}}
        </div>
    @endif
        <form action="/login/post" method="post" id="login_form">
        @csrf
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>

                    <div class="form-outline form-white mb-4">
                        <input type="text" id="username" class="form-control form-control-lg" required name="username" placeholder="Username"/>
                        <label class="form-label" for="username">Username</label>
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" id="password" class="form-control form-control-lg" required name="password" placeholder="Password"/>
                        <label class="form-label" for="password">Password</label>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-outline-light btn-lg px-5" di="login" type="submit">Login</button>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </form>
        </section>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <!-- jQuery CDN - Slim version (=without AJAX) End-->
        
        <!-- jQuery CDN - min version (=with AJAX) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- jQuery CDN - min version (=with AJAX) End-->

        <script>
            $("#login_form").submit(function(e){
            e.preventDefault();

            var all = $(this).serialize();
            // console.log(all)
                $.ajax({
                    url: "{{url('api/login')}}",
                    type: "POST",
                    data: all,
                    success: function(data){
                        window.location = {{url('dashboard')}}
                    },
                });
            });
        </script>
</body>
</html>