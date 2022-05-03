<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Gesher PTM - Personal Task Manager ( Laravel Version )</title>
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="Personal Task Manager" />
  <meta name="robots" content="index, follow">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet">        
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">        
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  

  <link rel="stylesheet" href="{{asset('js/bootstrap/css/bootstrap.min.css')}}" type="text/css" />  
  <link rel="stylesheet" href="{{asset('js/jquery-ui-1.13.1/jquery-ui.css') }}" type="text/css" />  
  <link rel="stylesheet" href="{{asset('js/zebra-dialog/css/materialize/zebra_dialog.css')}}" type="text/css" />  
  <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" />  
  <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
</head>
<body>
    
<div id=corpo_site>
  <div class="mainmenu-wrapper" style="background: silver;"><div class="container">
    <nav class="navbar navbar-sticky bootsnav" style="background: transparent;">
      <div class="container"><div class="navbar-header">
        <a class="navbar-brand" href="{{route('site.home')}}"><img src="{{asset('img/logo.png')}}" class="logo" title="Gesher" ></a>
      </div></div>   
    </nav>
  </div></div>
  <div class="section section-breadcrumbs" style="padding: 5px 0;"><div class="container"><div class="row" >
    <div class="col-md-12">
      <h1 style="display:block; float:left; clear:left; width: auto; ">Personal Task Manager</h1>
    </div>
  </div></div></div>
  <div class="section" style="padding: 5px 0;"><div class="container"><div class="row" >
    <div class="col-md-12"><div id="filtro">

    @yield('content')

    </div></div>
  </div></div></div>
</div>
<div id="footer" class="footer sticky" ><div class="container"><div class="row">
  <div class="col-md-6"><div class="footer-social-media"></div></div>
    <div class="col-md-6">
      <div class="footer-copyright"><div class=rodape-copyright>Copyright &copy; @php echo Date('Y'); @endphp &bull; All Rights Reserved<br/>Powered by Gesher</div></div>    
  </div>
</div></div></div>

<!-- Javascripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.0.js') }}"></script>


@yield('script')


</body>
</html>
      