<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Dashboard</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,900' rel='stylesheet'
          type='text/css'>
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet"/>
    <meta name="google" value="notranslate">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div id="keepalive"></div>

    @yield('content')

    <script src="{{ elixir("js/app.js") }}"></script>
    <script type="text/javascript">
        setInterval(function() {
            // click #keepalive element every 5 minutes to prevent Pi sleeping
            document.getElementById('keepalive').click();
        }, 300);
    </script>
    
</body>
</html>
