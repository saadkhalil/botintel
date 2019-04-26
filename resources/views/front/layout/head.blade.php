<!doctype html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="login to your bot from any browser Anywhere in the world">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="icon" href="{{asset('front/img/favicon.jpg')}}">
  <link rel="stylesheet" href="{{asset('front/css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('front/fontawesome/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <!-- // being header  -->
  <header class="navbar-wrapper">
  <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button id="humToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>
      <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('front/img/logo.png')}}" alt="Intelbots"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-menu">
      <ul class="nav navbar-nav navbar-right" id="login-register">
        @if(!Auth::user())
        <li><a href="#login-form" data-toggle="modal">Login </a></li>
        <li><a href="{{url('register')}}" data-toggle="modal">Sign Up </a></li>
         @else
           <li class={{ Request::path() == 'tasks' ? 'active' : '' }}><a href="{{url('tasks')}}">Tasks</a></li>
        <li class={{ Request::path() == 'profile' ? 'active' : '' }} ><a href="{{url('profile')}}">Profiles</a></li>
        <li class={{ Request::path() == 'release' ? 'active' : '' }}><a href="{{url('release')}}">Releases</a></li>
        <li class={{ Request::path() == 'settings' ? 'active' : '' }}><a href="{{url('settings')}}">Settings </a></li>

                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
        
        @endif
       <!--  <li class="dropdown">
          <a href="#">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

<!-- // being service -->
@yield('contents')
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 wow fadeInRight">
        <h5>Payments Accepted</h5>
        <img src="{{asset('front/img/stripe.png')}}" alt="stripe">
      </div>
      <div class="col-md-6 col-sm-6 wow fadeInLeft">
        <h5>Contact Information</h5>
        <ul class="list-unstyled">
         <!--  <li><a href="tel:+01234567">+01 234 567</a></li> -->
          <li><a href="mailto:info@botintel.io">info@botintel.io</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- // end footer -->
<!-- // being copyright -->
<div id="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6">
      <p>Copyright &copy; <b id="date-year"></b> - <a href="{{url('')}}">BotIntel™</a> -  All rights reserved.</p>
    </div>
      <div class="col-md-6  col-sm-6">
        <ul class="list-inline">
          @if($variable1)
          @foreach($variable1 as  $variable)
          <li><a href="{{url('')}}/{{$variable->page_slug}}">{{$variable->page_name}}</a></li>
          @endforeach
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- // end copyright -->

<!--****************-->
<!--   Modal Login Form Being   -->
<!--****************-->
      
        <div id="login-form" class="modal " data-easein="slideDownIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content form-bg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title">
                            Login
                        </h4>
                    </div>
                    <div class="modal-body">
                     <form action="{{ route('login') }}" aria-label="{{ __('Login') }}" method="POST" >
                     @csrf    
          <div class="form-group"> 
           <input id="email" type="email" placeholder="  Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
      @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif</div>
           <div class="form-group">
      <input id="password" type="password" placeholder="  Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
</div>
       <div class="form-group btn-row">
      <input type="submit"  value="Log-In" name="login" class="btn btn-primary"></div>
      <a href="#forget-form" id="fogotPwd" data-toggle="modal" class="btn-link">{{ __('Forgot Password?') }}</a>
                      
                        </form>
                    </div>
                </div>
            </div> 
        </div>

<!--****************-->
<!--   Modal Login Form END   -->
<!--****************-->



<!--****************-->
<!--   Modal forget Form Being   -->
<!--****************-->
        
        <div id="forget-form" class="modal " data-easein="slideDownIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            
                <div class="modal-content form-bg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title">
                            Forgot Password
                        </h4>
                    </div>
                    <div class="modal-body">
                     <div id="forgotmessage"></div>
                        
           <div class="form-group">
      <input type="email" required="" placeholder="Email" value="" id="forgotemail" name="email" class="form-control"></div>
       <div class="form-group btn-row">
		<div id="wait" style="display:none;"><img src="{{asset('front/img/loader.gif')}}" style="width:20%;"></div>
        <input type="hidden"  id="crf-token" value="{{ csrf_token() }}" name="_token">
      <input type="button" onclick="forgotsubmit()" id="forgotbtn" value="Forgot Password" name="login" class="btn btn-primary"></div>
                      
                        
                   
                </div>
            </div>
          </form>
        </div>

<!--****************-->
<!--   Modal forget Form END   -->

  <script src="{{asset('front/js/vendor/modernizr-3.6.0.min.js')}}"></script>
  <script>window.jQuery || document.write('<script src="{{asset('front/js/vendor/jquery-3.3.1.min.js')}}"><\/script>')</script>
  <script type="text/javascript">
    function forgotsubmit(){
$("#wait").css("display", "block");
$("#forgotbtn").css("display", "none");
var email= $('#forgotemail').val();
var crftoken= $('#crf-token').val();

       $.ajax({
            type: 'post',
            data: {'email':email ,'_token':crftoken } ,
            url: 'forgotpasswordsubmit',
            dataType: 'json',
            success: function(res){
				$("#wait").css("display", "none");
				
                if(res=="sent"){
					
				 $("#forgotbtn").css("display", "block");
                 $("#forgotmessage").html('<p style="color:green">Please check your mail</p>');
                }
            },
            error: function(res){
				
		        $("#forgotbtn").css("display", "block");
                $("#forgotmessage").html('<p style="color:red">Error ! Credentials not found</p>');
            }
			
        });
    }

  </script>

  <script src="{{asset('front/js/jquery.validate.js')}}"></script>
  <script src="{{asset('front/js/plugins.js')}}"></script>
  <script src="{{asset('front/js/main.js')}}"></script>
  <script>
      $(document).ready(function(){
          $('#fogotPwd').on('click',function(){
              //alert();
              $('#login-form').modal('hide');
              //$('#login-form').removeClass('in');
          })
      })
      
  </script>
  
</body>

</html>
