<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - GRADSTAY</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f1f5f9;
}

/* LAYOUT */
.wrapper{
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */
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
    padding:14px 16px;
    margin-bottom:10px;
    border-radius:12px;
    transition:0.3s;
    font-weight:bold;
}

.sidebar a:hover{
    background:#2563eb;
    color:white;
    transform:translateX(5px);
}

.logout-btn{
    margin-top:20px;
    width:100%;
    border:none;
    padding:14px;
    border-radius:12px;
    background:#ef4444;
    color:white;
    font-weight:bold;
    cursor:pointer;
}

.logout-btn:hover{
    background:#dc2626;
}

/* MAIN */
.main{
    flex:1;
    padding:30px;
}

/* TOPBAR */
.topbar{
    display:flex;
    justify-content:flex-end;
    align-items:center;
    margin-bottom:25px;
}

/* PROFILE */
.profile{
    background:white;
    padding:10px 16px;
    border-radius:14px;
    display:flex;
    align-items:center;
    gap:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.06);
}

.avatar{
    width:45px;
    height:45px;
    border-radius:50%;
    background:#16a34a;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

/* HERO */
.hero{
    background:linear-gradient(135deg,#16a34a,#14532d);
    color:white;
    padding:28px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}

/* CARDS */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-top:25px;
}

.card{
    background:white;
    padding:24px;
    border-radius:16px;
    box-shadow:0 10px 20px rgba(0,0,0,0.05);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h2{
    font-size:32px;
    color:#16a34a;
    margin-bottom:8px;
}

.card p{
    color:#64748b;
    font-weight:bold;
}
</style>

</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">GRADSTAY</div>

        <a href="/admin">🏠 Dashboard</a>
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="{{ route('admin.listings.index') }}">🏘 Listings</a>
        <a href="{{ route('admin.bookings') }}">📦 Bookings</a>
        <a href="{{ route('admin.settings') }}">⚙ Settings</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">🚪 Logout</button>
        </form>

    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR (ONLY PROFILE NOW) -->
        <div class="topbar">

            <div class="profile">

                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>

                <div>
                    <div style="font-weight:bold;">
                        {{ Auth::user()->name }}
                    </div>
                    <div style="font-size:13px;color:gray;">
                        Admin Panel 👑
                    </div>
                </div>

            </div>

        </div>

        <!-- HERO -->
        <div class="hero">
            <h1 style="font-size:30px;font-weight:bold;">
                Welcome Admin, {{ Auth::user()->name }}
            </h1>

            <p style="margin-top:10px;">
                Manage users, listings and bookings easily.
            </p>
        </div>

        <!-- STATS -->
        <div class="cards">

            <div class="card">
                <h2>{{ \App\Models\User::count() }}</h2>
                <p>Total Users</p>
            </div>

            <div class="card">
                <h2>{{ \App\Models\Listing::count() }}</h2>
                <p>Total Listings</p>
            </div>

            <div class="card">
                <h2>{{ \App\Models\Booking::count() }}</h2>
                <p>Total Bookings</p>
            </div>

            <div class="card">
                <h2>{{ \App\Models\Booking::where('status','pending')->count() }}</h2>
                <p>Pending Requests</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>