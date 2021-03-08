<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div id="wrp">
        <div class="panel panel-default">
            <div class="panel panel-header">
                <header class="bg-primary" style="text-align: center; padding-top: 15px; height: 50px;">All Columns &
                    Rows
                </header>
            </div>
            <div class="panel panel-body">
                <table class="table table-bordered" style="border: 1px solid black">
                    <thead class="bg bg-danger">
                    @foreach($cols as $col)
                        <th>{{$col}}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
                            @foreach(explode(',',$row) as $r)
                                <td>{{$r}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('pdfview',['download'=>'pdf', 'cols'=>$cols , 'row' => $rows]) }}">Download PDF</a>
</div>
</body>
</html>
