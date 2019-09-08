<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        #note{
            width: 400px;
            height:100px;
        }
    </style>
</head>
<body>
<div id="div1"></div>
<textarea name="note" id="note"></textarea>
<br />
<input type="button" id="submit" value="Commit" />

<h1>Messages</h1>
<hr>
<div id="liuyanban">

</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        getData();

        var userName = '<?php echo isset($_GET["name"])?$_GET["name"]:"null"; ?>';
        if(userName=="null"){
            location = "login.php";
        }

        $("#div1").html("Welcome，<span style='color:red;'>"+userName+"</span>");

        $("#submit").on("click",function(){
           var noteVal = $("#note").val();
           if(noteVal==""){
               alert("Message cannot be empty！");
               return;
           }
           var time = getTime();
           var note = {
               "userName":userName,
               "time":time,
               "noteVal":noteVal
           }

           $.post("doAdd.php",note,function(data){
               if(data=="true"){
                   alert("Message commit success！");
                   location.reload(true);
               }else{
                   alert("Message commit failed！");
               }
           });

        });
    });

    function getData(){
        $.post("doShowNotes.php",function(data){
            var arr = data.split("[;]");
            arr.pop();
            console.log(arr);
            for (var i=0;i< arr.length;i++) {
                var thisNote = $.parseJSON(arr[i]);
                var div = "<br/><div id='div"+i+"'>Username："+thisNote.userName+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time："+thisNote.time+"<br/><br/> Content："+thisNote.noteVal+"</div><br/><hr>"
                $("#liuyanban").prepend(div);
            }
        })
    }

    function getTime(){
        var today  = new Date();
        var year = today.getFullYear();
        var month = today.getMonth();
        var date1  = today.getDate();
        var hours = today.getHours();
        var minutes = today.getMinutes()<10?"0"+today.getMinutes():today.getMinutes();
        var seconds = today.getSeconds()<10?"0"+today.getSeconds():today.getSeconds();
        var dateTime = year+"年"+(month+1)+"月"+date1+"日"+hours+":"+minutes+":"+seconds;
        return dateTime;
    }
</script>
</html>