<!DOCTYPE html>
<html lang="en">

<head>
    <title>STS Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        h3{
            font-weight: bold;
            margin-bottom: 5px;
        }
        p{
            text-align: justify;
        }
        .bottom{
            margin-top: 20px;
            opacity: 0.9;
        }
        span
        {
            display: block;
        }


    </style>
</head>

<body>

    <h3>{{ $data['subject'] }}</h3>
    <p>{{ $data['details'] }}</p>

    <div class="bottom">
        <span>Best Regards</span>
        <small>STS Team</small>
    </div>


</body>

</html>
