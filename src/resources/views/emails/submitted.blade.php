<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Claim submitted</title>
</head>
<body>
    <p>Dear {{ $claim->user->name }},</p>
    <p><strong>Claim ID: {{ $claim->id }}</strong></p>
    <p>Thank you for completing your details and submitting your documentation. Your information is being verified and we will be in touch within 14 days.</p>
    <p>Regards</p>
    <p>The Lenovo Rewards Team</p>
</body>
</html>
