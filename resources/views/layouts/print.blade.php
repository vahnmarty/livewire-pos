<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body{
            background-color: #eee;
            font-size: 14px;;
        }

        .text-center{
            text-align: center;
        }

        h1,h2,h3,h4,h5,h6,p{
            margin: 1px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        
    </style>
</head>
<body>
    <div style="width: 100mm; background-color:#fff; padding: 3em 1em">

        @yield('content')
    </div>
</body>
</html>