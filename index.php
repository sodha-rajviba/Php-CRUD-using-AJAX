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
    <table border="1">
        <thead>
            <th>Username</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        <tbody id="tableBody">

        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(displayData());

        function displayData() {
            $.ajax({
                url: "./api/fetchall.php",
                type: "POST",
                success: function(response) {
                    let html = ''
                    for (let i = 0; i < response.users.length; i++) {
                        html += `
                <tr>
                    <td>${response.users[i].Username}</td>
                    <td>${response.users[i].Password}</td>
                    <td><a href="#" onclick='deleteData(${response.users[i].Id})'>Delete</a></td>
                    <td><a href="./pages/updatePage.php?id=${response.users[i].Id}">Update</a></td>
                </tr>
                `
                    }
                    $("#tableBody").html(html);
                }
            });
        };

        function insertData() {

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
                    displayData();
                    $('#username').val('');
                    $('#password').val('');
                    $('#username').focus();
                },
                error: function(e) {
                    console.log('error');
                }
            });
        }

        function deleteData(id) {
            $.ajax({
                url: "./api/delete.php",
                type: "POST",
                data: {
                    Id: id
                },
                success: function(response) {
                    console.log(response.success);
                    displayData();
                },
                error: function(e) {
                    console.log('error');
                }
            });
        }
    </script>
</body>

</html>