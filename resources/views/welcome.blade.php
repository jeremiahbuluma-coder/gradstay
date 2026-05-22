<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GradStay</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family: Arial, sans-serif;
}

/* HERO */
.hero{
    height:100vh;
    background:
    linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
    url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
    position:relative;
    color:white;
}

/* NAV */
.navbar{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    padding:18px 55px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    z-index:10;
}

.logo{
    font-size:22px;
    font-weight:bold;
    color:white;
}

.navbar a{
    color:#e5e7eb;
    text-decoration:none;
    font-size:14px;
    margin:0 12px;
}

.navbar a:hover{
    color:#ff6b3d;
}

/* HERO CONTENT */
.hero-content{
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.hero-content h1{
    font-size:46px;
    color:#f3f4f6;
    margin-bottom:10px;
}

.hero-content p{
    font-size:16px;
    opacity:0.9;
    margin-bottom:25px;
}

/* SIGN IN BUTTON */
.start-btn{
    padding:12px 24px;
    background:#ff6b3d;
    border:none;
    color:white;
    border-radius:6px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.start-btn:hover{
    background:#ffffff;
    color:#ff6b3d;
    transform:scale(1.08);
}

/* MODAL BACKDROP */
.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    justify-content:center;
    align-items:center;
    z-index:999;
}

/* LOGIN BOX */
.modal-content{
    background:white;
    padding:30px;
    border-radius:10px;
    width:300px;
    text-align:center;
}

.modal-content h2{
    margin-bottom:15px;
    color:#111;
}

.modal-content input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:1px solid #ddd;
    border-radius:6px;
    outline:none;
}

.login-btn{
    width:100%;
    padding:10px;
    background:#ff6b3d;
    border:none;
    color:white;
    border-radius:6px;
    font-weight:bold;
    cursor:pointer;
    margin-top:10px;
}

.login-btn:hover{
    background:#e85a2f;
}

/* CLOSE BUTTON */
.close{
    float:right;
    cursor:pointer;
    font-size:18px;
    color:#666;
}
</style>

</head>

<body>

<!-- HERO -->
<div class="hero">

    <!-- NAV -->
    <div class="navbar">
        <div class="logo">GradStay</div>

        <div>
            <a href="/">Home</a>
            <a href="/register">Register</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </div>
    </div>

    <!-- HERO CONTENT -->
    <div class="hero-content">

        <h1>Find Safe Student Accommodation</h1>
        <p>Trusted housing for students & graduates across campuses</p>

        <!-- SIGN IN BUTTON -->
        <a href="{{ route('login') }}" class="start-btn" style="display:inline-block; text-decoration:none;">
    Sign In
</a>

    </div>

</div>

<!-- LOGIN MODAL -->
<div class="modal" id="loginModal">
    <div class="modal-content">

        <span class="close" onclick="closeModal()">×</span>

        <h2>Login</h2>

        <input type="text" placeholder="Email or Username">
        <input type="password" placeholder="Password">

        <button class="login-btn">Login</button>
        
    </div>
</div>

<script>
function openModal(){
    document.getElementById("loginModal").style.display = "flex";
}

function closeModal(){
    document.getElementById("loginModal").style.display = "none";
}

// close when clicking outside box
window.onclick = function(event){
    let modal = document.getElementById("loginModal");
    if(event.target == modal){
        modal.style.display = "none";
    }
}
</script>

</body>
</html>