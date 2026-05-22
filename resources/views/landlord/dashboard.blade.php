<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Landlord Dashboard - GRADSTAY</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background:#f4f6fb;
}

/* TOP BAR */
.topbar{
    background:#0f172a;
    color:white;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.brand{
    font-size:18px;
    font-weight:700;
}

/* RIGHT SIDE */
.right{
    display:flex;
    align-items:center;
    gap:12px;
}

/* ICON BADGE */
.badge{
    background:#1e293b;
    padding:8px 14px;
    border-radius:25px;
    font-size:13px;
    display:flex;
    align-items:center;
    gap:8px;
}

/* PROFILE BADGE */
.profile-badge{
    background:white;
    color:#0f172a;
    padding:8px 15px;
    border-radius:30px;
    font-size:14px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:8px;
    box-shadow:0 5px 15px rgba(0,0,0,0.15);
}

.avatar{
    width:32px;
    height:32px;
    border-radius:50%;
    background:#0ea5e9;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:16px;
}

/* LOGOUT BUTTON */
.logout-btn{
    background:#ef4444;
    color:white;
    padding:8px 14px;
    border:none;
    border-radius:25px;
    cursor:pointer;
    font-size:13px;
    font-weight:600;
}

.logout-btn:hover{
    background:#dc2626;
}

/* CONTAINER */
.container{
    padding:30px;
}

/* HERO */
.hero{
    background:linear-gradient(135deg,#0ea5e9,#1e3a8a);
    color:white;
    padding:30px;
    border-radius:15px;
    margin-bottom:25px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.hero h2{
    margin:0;
    font-size:26px;
}

.hero p{
    margin-top:10px;
    opacity:0.9;
}

/* CARDS */
.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.06);
    text-align:center;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.icon{
    font-size:30px;
    margin-bottom:10px;
}

/* LINK */
a{
    text-decoration:none;
    color:inherit;
}
</style>

</head>

<body>

<!-- TOP BAR -->
<div class="topbar">

    <div class="brand">
        🏠 GRADSTAY LANDLORD PANEL
    </div>

    <div class="right">

        <!-- NEW ATTRACTIVE HUMAN PROFILE -->
        <div class="profile-badge">
            <div class="avatar">👨</div>
            {{ auth()->user()->name }}
        </div>

        <div class="badge">
            🏡 Landlord
        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn" type="submit">Logout</button>
        </form>

    </div>

</div>

<!-- MAIN -->
<div class="container">

    <!-- HERO -->
    <div class="hero">
        <h2>Welcome back, {{ auth()->user()->name }} 👋</h2>
        <p>Manage your properties, bookings, and grow your rental business with GRADSTAY.</p>
    </div>

    <!-- CARDS -->
    <div class="stats">

        <a href="{{ route('landlord.listings') }}">
            <div class="card">
                <div class="icon">🏠</div>
                <h3>My Listings</h3>
                <p>View and manage your properties</p>
            </div>
        </a>

        <a href="{{ route('landlord.listings.create') }}">
            <div class="card">
                <div class="icon">➕</div>
                <h3>Add Listing</h3>
                <p>Create a new property listing</p>
            </div>
        </a>

        <a href="{{ route('bookings.index') }}">
            <div class="card">
                <div class="icon">📦</div>
                <h3>My Bookings</h3>
                <p>View your reservations</p>
            </div>
        </a>

    </div>

</div>

</body>
</html>