<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GradStay - Login</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.card {
    width: 400px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    overflow: hidden;
}

.card-header {
    background: #2f3e4e;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 24px;
    font-weight: bold;
}

.card-body {
    padding: 25px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.btn {
    width: 100%;
    padding: 12px;
    background: #e67e22;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 5px;
}

.btn:hover {
    background: #cf711f;
}

.links {
    text-align: center;
    margin-top: 15px;
}

.links a {
    color: #e67e22;
    text-decoration: none;
}

.error-box{
    background:#ffe6e6;
    color:#c0392b;
    padding:10px;
    border-radius:5px;
    margin-bottom:15px;
    text-align:center;
    font-size:14px;
}
</style>
</head>

<body>

<div class="card">
    <div class="card-header">
        GRADSTAY
    </div>

    <div class="card-body">
        <h2>Sign In</h2>

        @if ($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <!-- SIGN IN BUTTON MOVED UP -->
            <button type="submit" class="btn">Sign In</button>

            <!-- FORGOT PASSWORD MOVED BELOW BUTTON -->
            <div class="links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>
        </form>

        <div class="links">
            <p>
                Don't have an account?
                <a href="{{ route('register') }}">Register here</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>