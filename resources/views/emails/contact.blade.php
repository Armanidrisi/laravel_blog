

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Email styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .email-title {
            font-size: 24px;
            color: #333;
        }

        .email-content {
            margin-bottom: 20px;
        }

        .email-content p {
            line-height: 1.5;
        }

        .email-footer {
            text-align: center;
        }

        .email-footer p {
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1 class="email-title">Contact Form Submission</h1>
        </div>

        <div class="email-content">
            <p>Hi there,</p>
            <p>You have received a new contact form submission. Here are the details:</p>

            <table>
                <tr>
                    <td style="padding-right: 10px;"><strong>Name:</strong></td>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <td style="padding-right: 10px;"><strong>Email:</strong></td>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <td style="padding-right: 10px;"><strong>Message:</strong></td>
                    <td>{{ $message }}</td>
                </tr>
            </table>
        </div>

        <div class="email-footer">
            <p>This email was sent via the contact form on your website.</p>
        </div>
    </div>
</body>
</html>
