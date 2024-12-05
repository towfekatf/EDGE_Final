<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <link href="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h1>Reset Your Password</h1>
                </div>
                <div class="card-body">
                    <p class="text-center">We received a request to reset your password. You can reset your password by clicking the button below:</p>
                    <div class="text-center">
                        <a href="{{ route('website.customer.new_password', $token) }}" class="btn btn-primary">Reset Password</a>
                    </div>
                    <p class="text-center mt-4">If you did not request a password reset, please ignore this email or contact support if you have any questions.</p>
                </div>
                <div class="card-footer text-center bg-light">
                    <p>© {{ date('Y') }} Your Company. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('https://code.jquery.com/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{url('https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js')}}"></script>
<script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}"></script>
</body>
</html>
