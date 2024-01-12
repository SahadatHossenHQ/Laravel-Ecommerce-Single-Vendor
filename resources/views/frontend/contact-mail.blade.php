<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Contact Message</title>

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            
            <div class="card-body">
                 <img src="{{asset('uploads/setting/'.setting('logo'))}}" width="75px">
                <p>
                    You must confirm your {{$email}} email before you can sign in.

                    <br>
                    <h4>Your Email Verification Code: {{$code}}</h4>
                </p>
                <p style="margin:0px !important">Mobile: +8801306330332</p>
                <p style="margin:0px !important">Website: https://zishantherapy.com/</p>
            </div>
        </div>
    </div>
    
</body>
</html>