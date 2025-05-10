<!DOCTYPE html>
<html>
<body>
    <p>Hello {{ $user->name ?? 'User' }},</p>

    <p>You requested a password reset. If this was you, click the link below:</p>

    <a href="{{ route('membership.new_password', ['id' => $user->id]) }}">Reset Password</a>

    <p>If you didn’t request this, please ignore this message.</p>

    <p>Regards,<br>FAMS Support Team</p>
</body>
</html>
