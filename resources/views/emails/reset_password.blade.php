<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>Hello {{ $user->firstname.' '.$user->lastname ?? 'User' }},</p>

    <p>You requested a password reset. If this was you, click the button below:</p>

    <a href="{{ route('membership.new_password', ['id' => $user->id]) }}"
       style="display: inline-block; padding: 10px 20px; background-color: #305fa7; color: #fff;
              text-decoration: none; border-radius: 5px; font-weight: bold;">
        Reset Password
    </a>

    <p>If you didn’t request this, please ignore this message.</p>

    <p>Regards,<br>FAMS Support Team</p>
</body>
</html>
