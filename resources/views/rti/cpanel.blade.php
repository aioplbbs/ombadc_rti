<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
</head>
<body>
    <form action="{{$account->cpanel}}" method="post" id="cpanelLogin">
        <input type="hidden" name="user" value="{{$account->username}}">
        <input type="hidden" name="pass" value="{{$account->password}}">
    </form>
    <script>
        document.getElementById('cpanelLogin').submit();
    </script>
</body>
</html>