<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <form>
        <input type="text" name="username" id="username">
        <input type="text" name="password" id="password">
        <input type="button" value="Submit" onclick="insertData()">
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function insertData() 
    {

    let data = {
    username: $('#username').val(),
    password: $('#password').val()
    }

    $.ajax({
    url: "./api/insert.php",
    type: "POST",
    data: data,
    success: function(response) {
        //alert("Data inserted successfully");
        console.log(response.success);
        $('#username').val('');
        $('#password').val('');
        $('#username').focus();
    },
    error: function(e) {
        console.log('error');
    }
    });

    }
</script>
</body>
</html>
