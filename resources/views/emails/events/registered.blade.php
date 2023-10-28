<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$event->name}}</title>
    <style>
        /* Reset email client default styles */
        body,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        ul,
        ol,
        li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            background-color: #f4f4f4;
            /* Grey background */
        }

        img {
            max-width: 100%;
        }

        /* Tailwind CSS classes */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            /* White content background */
        }

        .text-center {
            text-align: center;
        }

        .bg-blue-500 {
            background-color: #4299e1;
        }

        .text-white {
            color: #ffffff;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="bg-blue-500 text-white text-center py-4 mb-4">
            <h1 class="text-2xl">{{$event->name}}</h1>
        </div>
        <p>Hello {{$attendance->user->name}}.</p> <br>
        <p>And thank you for taking the time to register for {{$event->name}}. Your registration was successful and we are elated. It's going to be the best time of our lives yet and we are really excited at the transformation that you'll experience.</p> <br>

        <p>If you\’ll be attending onsite, upon arrival, you will be required to confirm your registration and receive your Welcome Package at the registration stand, kindly stop by!</p> <br>

        <p>Kindly find details of your registration below:</p> <br>

        Phone: {{$attendance->user->phone}} <br /> <br>

        Email: {{$attendance->user->email}} <br /> <br>

        Accommodation: {{$attendance->requires_accommodation ? 'Yes' : 'No'}} <br /> <br>

        Feeding: {{$attendance->requires_feeding ? 'Yes' : 'No'}}<br /> <br>

        Transportation: {{$attendance->requires_transport ? 'Yes' : 'No'}}<br /> <br>

        <p>Kindly keep an eye out for our emails on further notifications and instructions. To avoid our mail going into your spam or promotions, do well to add our email to your contact list. You can also join the Telegram Channel (t.me/cfcic) for quick notifications and messages.</p> <br>

        <p>We look forward to hosting you, your friends and family at FA'23. If they haven\’t registered, simply get them to register by sharing this link with them <br />

            <a href="https://app.christfamilyministries.org/">https://app.christfamilyministries.org/</a>

        </p> <br>

        <p>
            With all our Love, <br />
            The Registration Team, <br />
            Christ Family Ministry.
        </p>

    </div>
</body>

</html>
