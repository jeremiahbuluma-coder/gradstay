<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About - GRADSTAY</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    background:#0f172a;
    color:white;
}

/* NAVBAR */

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:25px 70px;
    background:rgba(255,255,255,0.05);
}

.logo{
    font-size:32px;
    font-weight:bold;
}

.nav-links a{
    color:white;
    text-decoration:none;
    margin-left:25px;
    transition:0.3s;
}

.nav-links a:hover{
    color:#38bdf8;
}

/* HERO */

.hero{
    text-align:center;
    padding:100px 20px 60px;
}

.hero h1{
    font-size:55px;
    margin-bottom:20px;
}

.hero p{
    max-width:800px;
    margin:auto;
    line-height:1.8;
    color:#cbd5e1;
}

/* CARDS */

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:30px;
    padding:50px 70px;
}

.card{
    background:rgba(255,255,255,0.06);
    padding:35px;
    border-radius:20px;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-10px);
}

.card h3{
    margin-bottom:15px;
    color:#38bdf8;
}

.card p{
    color:#cbd5e1;
    line-height:1.7;
}

/* FOOTER */

.footer{
    text-align:center;
    padding:25px;
    background:#020617;
    color:#94a3b8;
}

</style>
</head>

<body>

<div class="navbar">

    <div class="logo">GradStay</div>

    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </div>

</div>

<section class="hero">

    <h1>About GRADSTAY</h1>

    <p>
        GRADSTAY helps students and graduates find safe, trusted,
        and affordable accommodation near campuses.
        We connect students with landlords through a modern
        and secure housing platform.
    </p>

</section>

<section class="cards">

    <div class="card">
        <h3>Safe Housing</h3>

        <p>
            Verified and trusted student accommodation
            with improved security and comfort.
        </p>
    </div>

    <div class="card">
        <h3>Easy Booking</h3>

        <p>
            Students can request and manage
            bookings easily through the platform.
        </p>
    </div>

    <div class="card">
        <h3>Modern Platform</h3>

        <p>
            Clean modern design with a smooth
            user experience for students and landlords.
        </p>
    </div>

</section>

<div class="footer">
    © 2026 GRADSTAY | Student Accommodation Platform
</div>

</body>
</html>