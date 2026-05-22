<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Settings - GRADSTAY</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:linear-gradient(135deg,#0f172a,#1e3a8a,#0f172a);
    background-size:400% 400%;
    animation: bgMove 10s ease infinite;
    color:#1f2937;
}

@keyframes bgMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* LAYOUT */
.wrapper{
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */
.sidebar{
    width:270px;
    background:rgba(15,23,42,0.95);
    backdrop-filter:blur(10px);
    color:white;
    padding:25px;
    box-shadow:10px 0 30px rgba(0,0,0,0.3);
}

.sidebar h2{
    color:#38bdf8;
    margin-bottom:30px;
    text-align:center;
    font-size:24px;
    letter-spacing:1px;
}

.sidebar a{
    display:block;
    padding:12px 14px;
    margin-bottom:12px;
    color:#cbd5e1;
    text-decoration:none;
    border-radius:12px;
    transition:0.3s;
    font-weight:bold;
}

.sidebar a:hover{
    background:linear-gradient(90deg,#2563eb,#0ea5e9);
    color:white;
    transform:translateX(6px);
}

/* MAIN */
.main{
    flex:1;
    padding:35px;
}

/* TITLE */
h1{
    color:white;
    font-size:30px;
    margin-bottom:8px;
}

.subtitle{
    color:#cbd5e1;
    margin-bottom:25px;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:25px;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.95);
    padding:25px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-6px);
}

.card h2{
    font-size:20px;
    margin-bottom:15px;
    color:#111827;
}

/* INPUT */
label{
    display:block;
    margin-top:12px;
    font-weight:bold;
    font-size:13px;
    color:#374151;
}

input{
    width:100%;
    padding:11px;
    margin-top:6px;
    border:1px solid #e5e7eb;
    border-radius:12px;
    outline:none;
    transition:0.3s;
}

input:focus{
    border-color:#0ea5e9;
    box-shadow:0 0 0 3px rgba(14,165,233,0.2);
}

/* BUTTON */
button{
    margin-top:18px;
    padding:12px 16px;
    width:100%;
    border:none;
    border-radius:12px;
    background:linear-gradient(90deg,#0ea5e9,#2563eb);
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
    box-shadow:0 10px 20px rgba(14,165,233,0.4);
}

/* SMALL INFO */
.info{
    color:#94a3b8;
    font-size:13px;
    margin-bottom:20px;
}
</style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h2>GRADSTAY ADMIN</h2>

        <a href="/admin">🏠 Dashboard</a>
        <a href="{{ route('admin.users') }}">👤 Users</a>
        <a href="{{ route('admin.listings.index') }}">🏘 Listings</a>
        <a href="{{ route('admin.bookings') }}">📦 Bookings</a>
        <a href="{{ route('admin.settings') }}">⚙ Settings</a>

    </div>

    <!-- MAIN -->
    <div class="main">

        <h1>⚙ Settings Panel</h1>
        <p class="subtitle">Manage your admin profile and system configuration</p>

        <div class="grid">

            <!-- PROFILE CARD -->
            <div class="card">

                <h2>👤 Profile Settings</h2>
                <p class="info">Update your admin personal details</p>

                <label>Name</label>
                <input type="text" value="{{ auth()->user()->name }}">

                <label>Email</label>
                <input type="email" value="{{ auth()->user()->email }}">

                <button>Update Profile</button>

            </div>

            <!-- SYSTEM CARD -->
            <div class="card">

                <h2>⚙ System Settings</h2>
                <p class="info">Control platform configuration</p>

                <label>Platform Name</label>
                <input type="text" value="GRADSTAY">

                <label>Support Email</label>
                <input type="email" value="support@gradstay.com">

                <button>Save Settings</button>

            </div>

        </div>

    </div>

</div>

</body>
</html>