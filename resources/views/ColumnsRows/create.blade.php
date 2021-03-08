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
    <div class="panel panel-default">
        <div class="panel panel-header">
            <header class="bg-primary" style="text-align: center; padding-top: 15px; height: 50px;">Enter the Rows &
                Columns
            </header>
        </div>
        <div class="panel panel-body">
            <form action="{{asset('pdfview')}}" method="post">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <label>Enter Columns</label>
                <input type="text" placeholder="Enter Columns" class="form-control" name="columns" required>
                <label>Enter Rows</label>
                <input type="text" id="allRows" placeholder="Enter Rows" name="rows[]"
                       style="width: 1050px; height: 35px;">

                <a onclick="getVal()">
                    <input type="hidden" name="value" id="hiddenVal" value="0">
                    <span class="btn btn-primary">Add</span></a><br><br>
                <div id="row_name">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function getVal() {
        var values = $("input[name='rows[]']").val()

        if (values != '') {
            var counter = $("input[name='value']").val();
            counter++;
            $("#hiddenVal").val(counter);
            var fieldHTML = '<div class="test' + counter + '"><input type="text" name="rows[]" value="' + values + '" class="form-control" style="width: 1050px;"/><a onclick="removeVal(' + counter + ')"> <span class="btn btn-primary">Remove</span></a><br><br></div>';
            $('#row_name').append(fieldHTML);
            $('#allRows').val('');
        }
    }

    function removeVal(ab) {
        $('.test' + ab).remove();
    }

</script>
