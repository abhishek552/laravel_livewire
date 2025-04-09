<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f9fc; padding: 20px; color: #333;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #1a73e8; margin-bottom: 20px;">New Contact Form Submission</h2>

        <div style="margin-bottom: 15px;">
            <strong style="display: inline-block; width: 120px; color: #555;">Name:</strong> {{ $data['name'] }}
        </div>
        <div style="margin-bottom: 15px;">
            <strong style="display: inline-block; width: 120px; color: #555;">Email:</strong> {{ $data['email'] }}
        </div>
        <div style="margin-bottom: 15px;">
            <strong style="display: inline-block; width: 120px; color: #555;">Subject:</strong> {{ $data['subject'] }}
        </div>
        <div style="margin-bottom: 15px;">
            <strong style="display: inline-block; width: 120px; color: #555;">Message:</strong>
            <div style="margin-top: 8px; line-height: 1.6;">
                {{ $data['message'] }}
            </div>
        </div>

        <div style="margin-top: 30px; font-size: 12px; color: #999; text-align: center;">
            &copy; {{ date('Y') }} Contact Notification. All rights reserved.
        </div>
    </div>
</body>
</html>
