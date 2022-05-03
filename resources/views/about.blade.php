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
Date:03/05/2022
Project: WMT Training
-completed learning validation via documentation
-learning relationship and Auth in laravel
-learnt and implemented blade template.