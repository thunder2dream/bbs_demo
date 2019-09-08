<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body{
            margin: 0px;
            padding: 0px;
            background-color: #CCCCCC;
        }
        .panel{
            width: 380px;
            height: 350px;
            position: absolute;
            left: 50%;
            margin-left: -190px;
            top: 50%;
            margin-top: -175px;
        }
        .form-horizontal{
            padding: 10px 20px;
        }
        .btns{
            display: flex;
            justify-content: center;
        }
    </style>
</head>


<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Sign up</div>
    </div>
    <div class="panel-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="userName"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pwd" />
            </div>
            <div class="form-group">
                <label>Confirmation</label>
                <input type="password" class="form-control" name="rePwd" />
            </div>

            <div class="form-group btns">
                <input type="button" class="btn btn-primary" value="Create" id="submit"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a type="button" class="btn btn-success" href="index.php"/>Login</a>
            </div>

        </form>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#submit").click(
            function() {
                var str = $("form").serialize();
                console.log(str);
                $.post("doReg.php", {"formData": str}, function (data, status) {
                    if (data == "true") {
                        alert("Success！Going to Login！");
                        location = "login.php";
                    } else {
                        alert("Failed！Going to Sign up" + status);
                    }
                })
            }
        )

    });

</script>
</html>