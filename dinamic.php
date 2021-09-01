<!DOCTYPE html>
<html lang = "eng">
    <head>
        <meta charset = "UTF-8" />
        <link rel = "stylesheet" type = "text/css" href = "css/style.css" />
        <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
<body>
    <nav class = "navbar navbar-default navbar-fixed-top">
        <div class = "container-fluid">
            <a class = "navbar-brand" href  = "https://www.sourcecodester.com">Sourcecodester</a>
        </div>
    </nav>
    <br />
    <br />
    <br />
    <br />
        <center><h2>Simple dynamic input using jQuery/MySQLi</h2></center>
    <br />
    <br />
    <br />
    <div class = "row">
        <div class = "col-md-3">
        </div>
        <div class = "col-md-1" style = "margin-left:10px;" >
            <button class = "btn btn-success" id = "add"><span class = "glyphicon glyphicon-plus"></span> Add new Entry</button>
            <br />
            <br />
        </div>
        <form method = "POST" action = "save_data.php"> 
        <button class = "btn btn-primary" name = "submit" ><span class = "glyphicon glyphicon-save"></span> Submit</button>
        <div style = "margin-left:30px;" id = "input" class = "col-md-3">
            <div class = "well">    
                <div class = "form-group">
                    <label>Firstname</label>
                    <input class = "form-control" type =  "text" name = "firstname[]"/>
                </div>
                <div class = "form-group">
                    <label>Lastname</label>
                    <input class = "form-control" type =  "text" name = "lastname[]"/>
                </div>
            </div>      
        </div>
        </form>
    </div>
</body> 
<script src = "js/jquery.js"></script>
<script type = "text/javascript">   
    $(document).ready(function(){
        $('#add').click(function(){
                $input = $('<div class = "well">'   
                + '<div class = "form-group">'
                + '<label>Firstname</label>'
                + '<input class = "form-control" type =  "text" name = "firstname[]" required = "required"/>'
                + '</div>'
                + '<div class = "form-group">'
                + '<label>Lastname</label>'
                + '<input class = "form-control" type =  "text" name = "lastname[]" required = "required"/>'
                + '</div>');
                $input.fadeIn(1000).appendTo('#input');
        });
    });
</script>   
</html> 