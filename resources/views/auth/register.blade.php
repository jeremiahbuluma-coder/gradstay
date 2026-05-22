<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GradStay Register</title>

<style>
body{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;
    background:#f5f6fa;
}

.container{
    width:100%;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* SMALLER CARD */
.card{
    width:430px;
    background:white;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
}

.header{
    background:#2d3e50;
    color:white;
    text-align:center;
    padding:18px;
    font-size:28px;
    font-weight:bold;
}

.content{
    padding:22px 28px;
}

.title{
    text-align:center;
    font-size:24px;
    font-weight:bold;
    margin-bottom:18px;
}

label{
    display:block;
    font-size:16px;
    font-weight:bold;
    margin-top:12px;
    margin-bottom:5px;
}

input{
    width:100%;
    padding:11px;
    border:1px solid #cfd6df;
    border-radius:6px;
    background:#eef3fb;
    font-size:15px;
    box-sizing:border-box;
}

button{
    width:100%;
    margin-top:18px;
    padding:12px;
    border:none;
    border-radius:6px;
    background:#e67e22;
    color:white;
    font-size:18px;
    cursor:pointer;
}

.bottom{
    text-align:center;
    margin-top:15px;
    font-size:15px;
}

.bottom a{
    color:#e67e22;
    text-decoration:none;
}
</style>
</head>

<body>

<div class="container">
    <div class="card">

        <div class="header">GRADSTAY</div>

        <div class="content">

            <div class="title">Register</div>
            @if ($errors->any())
    <div style="background:red;color:white;padding:10px;margin-bottom:15px;border-radius:5px;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label>Name</label>
                <input type="text" name="name" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>

                <button type="submit">Register</button>

                <div class="bottom">
                    Already have an account?
                    <a href="{{ route('login') }}">Sign In here</a>
                </div>

            </form>

        </div>

    </div>
</div>

</body>
</html>