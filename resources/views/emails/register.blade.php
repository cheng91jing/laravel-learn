<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册确认链接</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>感谢您在 {{ config('app.name', 'Laravel') }} 网站进行注册！</h1>
    <p>
        请点击下面的链接完成注册：
        <a class="button btn-primary" href="{{ route('confirm_email', $user->email_confirm_code) }}">
            {{ route('confirm_email', $user->email_confirm_code) }}
        </a>
    </p>
    <p>
        如果这不是您本人的操作，请忽略此邮件。
    </p>
</body>
</html>