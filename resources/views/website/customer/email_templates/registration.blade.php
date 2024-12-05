<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Buffalo</title>
    <link href="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Welcome to Buffalo</h1>
        </div>
        <div class="card-body">
            <p><b>Dear {{ $customer["name"] }},</b></p>
            <p>Congratulations and a warm welcome to Buffalo – your gateway to a vibrant community of like-minded individuals! 🌟 We are thrilled to have you on board, and we can't wait to embark on this exciting journey together.</p>
            <p>Your registration is complete, and you are now officially a customer of Buffalo. Here are your login details:</p>
            <table class="table table-bordered">
                <thead>
                <tr class="bg-light">
                    <th>🔐 Registered ID</th>
                    <td>{{ $customer["email"] }}</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>🔑 Password</th>
                    <td>{{ $customer["password"] }}</td>
                </tr>
                <tr class="bg-light">
                    <th>🌐 Website URL</th>
                    <td><a href="{{ route('website.home') }}">{{ route('website.home') }}</a></td>
                </tr>
                </tbody>
            </table>
            <p>Please keep these details secure and use them to access our exclusive Customer-only features, connect with fellow customers, and explore the enriching experiences we have in store for you.</p>
            <p>Feel free to dive into our forums, events, and discussions to make the most out of your Khulna Society membership. Your unique perspective and contributions are highly valued.</p>
            <p>If you have any questions or need assistance, our support team is here for you. Don't hesitate to reach out at <a href="mailto:asifrafiun@gmail.com">rafiun</a>.</p>
            <p>Once again, congratulations on becoming a part of Buffalo! We look forward to building lasting connections and creating wonderful memories together.</p>
        </div>
        <div class="card-footer text-center bg-light">
            <p>© {{ date('Y') }} Buffalo. All rights reserved.</p>
        </div>
    </div>
</div>

<script src="{{url('https://code.jquery.com/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{url('https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js')}}"></script>
<script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}"></script>
</body>
</html>
