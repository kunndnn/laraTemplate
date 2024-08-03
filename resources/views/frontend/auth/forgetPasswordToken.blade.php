<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot - Forget Password Email</title>
</head>

<body>
    <table
        style="max-width: 600px; margin: 0 auto; padding: 20px; border-collapse: collapse; font-family: Arial, sans-serif;">
        <tr>
            <td style="background-color: #ffffff; padding: 20px; text-align: center;">
                <h2 style="margin-bottom: 20px;">Chatbot - Forget Password Email</h2>
                <p>You can reset your password by clicking the button below:</p>
                <p style="margin-top: 30px;"><a href="{{ route('reset.password.get', $token) }}"
                        style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px;">Reset
                        Password</a></p>
                <p style="margin-top: 20px;">If you did not request this password reset, you can safely ignore this
                    email.</p>
            </td>
        </tr>
    </table>
</body>

</html>
