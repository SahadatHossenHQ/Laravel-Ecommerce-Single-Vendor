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
        <div class="card" style="background:transparent;">
            <img src="{{asset('uploads/setting/'.setting('logo'))}}" width="75px">
            <div class="card-header">
                <h3 class="card-title">Have you forgotten your password?</h3>
            </div>
            <div class="card-body">
                <p>
                    <h4>Here is your new password: {{$code}}</h4>
                    If you want, you can set a new password by logging into the account.
                </p>
                <p style="margin:0px !important">Mobile: {{setting('SITE_INFO_PHONE')}}</p>
                <p style="margin:0px !important">Website: {{env('APP_URL')}}</p>
                <p style="margin:0px !important">Address: {{setting('SITE_INFO_ADDRESS')}}</p>
            </div>
        </div>
    </div>
</body>
</html>