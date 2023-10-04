<!DOCTYPE html>
<html>
<head>
    <title>Welcome to NSITF</title>
</head>
<body>
    <p>Hello {{ $users->first_name . ' ' . $users->last_name }}</p>
    <p>You are receiving this email because we created a new account for you.</p>
    <p>You can use this details to login and access your dashboard.</p>
    <p>Email Address: {{ $users->email }}</p>
    <p>Password: <b>Testingdata1!</b></p>
    <a href="{{ url('/login') }}" style="
    box-sizing: border-box;
    font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
    border-radius: 4px;
    color: #fff;
    display: inline-block;
    overflow: hidden;
    text-decoration: none;
    background-color: #2d3748;
    border-bottom: 8px solid #2d3748;
    border-left: 18px solid #2d3748;
    border-right: 18px solid #2d3748;
    border-top: 8px solid #2d3748;">LOGIN</a>
    <hr/>
    <p>
        If you're having trouble clicking the "LOGIN" button, copy and paste this URL below into your web browser:
        {{ url('/login') }}</p>
</body>
</html>
