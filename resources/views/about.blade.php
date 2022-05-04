<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>

<body>
    <h1>About Page</h1>
    {{-- {{count($users)}} --}}
    @foreach ($users as $username)
        <h4>{{$username}}</h4>
    @endforeach
</body>

</html>
Date:04/05/2022
Project: WMT Training
-learnt relationship via documentation and video and also implmented
-learning mutators video and implementation.