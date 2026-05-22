<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password - GRADSTAY</title>

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
.header {
    background: #1f2d3d;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 1px;
}

/* Body */
.body {
    padding: 30px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #2c3e50;
}

/* Inputs */
input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
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
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background: #cf711f;
}

/* Error box */
.error {
    background: #ffe6e6;
    color: #c0392b;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    text-align: center;
    font-size: 13px;
}

/* Success */
.success {
    background: #e8f9ee;
    color: #1e7e34;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    text-align: center;
    font-size: 13px;
}
</style>
</head>

<body>

<div class="card">

    <div class="header">
        GRADSTAY
    </div>

    <div class="body">

        <h2>Reset Password</h2>

        <!-- SUCCESS MESSAGE -->
        @if (session('status'))
            <div class="success">
                {{ session('status') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- TOKEN (FIXED) -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- EMAIL (FIXED) -->
            <input type="email" name="email"
                   value="{{ request()->query('email') }}"
                   placeholder="Email Address"
                   required>

            <!-- NEW PASSWORD -->
            <input type="password" name="password" placeholder="New Password" required>

            <!-- CONFIRM PASSWORD -->
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

            <button type="submit">Reset Password</button>
        </form>

    </div>
</div>

</body>
</html>