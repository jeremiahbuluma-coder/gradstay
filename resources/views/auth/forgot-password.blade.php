<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - GRADSTAY</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #1f2d3d, #3a4a5f);
}

/* Card */
.card {
    width: 420px;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
}

/* Header */
.card-header {
    background: #1f2d3d;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 1px;
}

/* Body */
.card-body {
    padding: 30px;
}

h2 {
    text-align: center;
    margin-bottom: 10px;
    color: #2c3e50;
}

p {
    text-align: center;
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
}

/* Input */
input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-top: 8px;
    margin-bottom: 20px;
    outline: none;
}

input:focus {
    border-color: #e67e22;
    box-shadow: 0 0 5px rgba(230,126,34,0.3);
}

/* Button */
button {
    width: 100%;
    padding: 12px;
    background: #e67e22;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #cf711f;
}

/* Links */
a {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #e67e22;
    text-decoration: none;
    font-size: 14px;
}

a:hover {
    text-decoration: underline;
}

/* Success message */
.success {
    background: #e8f9ee;
    color: #1e7e34;
    padding: 10px;
    border-radius: 6px;
    font-size: 13px;
    margin-bottom: 15px;
    text-align: center;
}

/* Error */
.error {
    background: #ffe6e6;
    color: #c0392b;
    padding: 10px;
    border-radius: 6px;
    font-size: 13px;
    margin-bottom: 15px;
    text-align: center;
}
</style>
</head>

<body>

<div class="card">

    <div class="card-header">
        GRADSTAY
    </div>

    <div class="card-body">

        <h2>Forgot Password?</h2>
        <p>Enter your email and we will send you a reset link</p>

        <!-- SUCCESS MESSAGE -->
        @if (session('status'))
            <div class="success">
                {{ session('status') }}
            </div>
        @endif

        <!-- ERROR -->
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label>Email Address</label>
            <input type="email" name="email" required>

            <button type="submit">Send Reset Link</button>
        </form>

        <a href="{{ route('login') }}">← Back to Login</a>

    </div>

</div>

</body>
</html>