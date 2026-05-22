<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard - GRADSTAY</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body{
    background:#f1f5f9;
    font-family:Arial;
}

.wrapper{
    display:flex;
    min-height:100vh;
}

.sidebar{
    width:270px;
    background:linear-gradient(180deg,#0f172a,#1e293b);
    color:white;
    padding:25px;
}

.logo{
    font-size:26px;
    font-weight:bold;
    color:#38bdf8;
    margin-bottom:35px;
    text-align:center;
}

.sidebar a{
    display:block;
    text-decoration:none;
    color:#cbd5e1;
    padding:14px;
    margin-bottom:10px;
    border-radius:12px;
}

.sidebar a:hover{
    background:#2563eb;
}

.logout-btn{
    margin-top:20px;
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#ef4444;
    color:white;
}

.main{
    flex:1;
    padding:30px;
}

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.search-box{
    padding:12px;
    border-radius:10px;
    border:1px solid #ccc;
    width:300px;
}

.search-btn{
    padding:12px 16px;
    background:#0ea5e9;
    color:white;
    border:none;
    border-radius:10px;
}

.hero{
    background:linear-gradient(135deg,#0ea5e9,#1d4ed8);
    color:white;
    padding:25px;
    border-radius:15px;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
    margin-top:25px;
}

.card{
    background:white;
    padding:20px;
    border-radius:15px;
}
</style>

</head>

<body>

@php
$user = Auth::user();
@endphp

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">GRADSTAY</div>

        <a href="/dashboard">🏠 Dashboard</a>
        <a href="/listings">🏘 Listings</a>
        <a href="{{ route('bookings.index') }}">📦 My Bookings</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>

    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <form method="GET" action="{{ route('listings.index') }}" style="display:flex;gap:10px;">
                <input type="text" name="search" placeholder="Search..." class="search-box">
                <button class="search-btn">Search</button>
            </form>

            <div>
                <strong>
                    {{ $user ? $user->name : 'Guest' }}
                </strong>
            </div>

        </div>

        <!-- HERO -->
        <div class="hero">

            <h1>
                Welcome, {{ $user ? $user->name : 'User' }}
            </h1>

            <p>Find your perfect accommodation easily.</p>

        </div>

        <!-- CARDS -->
        <div class="cards">

            <div class="card">
                <h2>{{ \App\Models\Listing::count() }}</h2>
                <p>Listings</p>
            </div>

            <div class="card">
                <h2>{{ $user ? \App\Models\Booking::where('user_id',$user->id)->count() : 0 }}</h2>
                <p>My Bookings</p>
            </div>

            <div class="card">
                <h2>24/7</h2>
                <p>Support</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>