<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GRADSTAY Listings</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background:#f4f7fb;
    color:#111827;
}

/* =========================
   NAVBAR
========================= */

.navbar{
    width:100%;
    background:white;
    padding:18px 50px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 12px rgba(0,0,0,0.06);
    position:sticky;
    top:0;
    z-index:1000;
}

.logo{
    font-size:30px;
    font-weight:800;
    color:#2563eb;
}

.nav-links{
    display:flex;
    gap:30px;
}

.nav-links a{
    text-decoration:none;
    color:#374151;
    font-weight:600;
    transition:0.3s;
}

.nav-links a:hover{
    color:#2563eb;
}

.active{
    color:#2563eb !important;
}

.login-btn{
    background:#2563eb;
    color:white;
    padding:10px 18px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}

/* =========================
   HERO SECTION
========================= */

.hero{
    max-width:1300px;
    margin:50px auto;
    padding:0 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:40px;
}

.hero-left{
    flex:1;
}

.hero-left h1{
    font-size:65px;
    line-height:1.1;
    font-weight:900;
    color:#111827;
}

.hero-left span{
    color:#2563eb;
}

.hero-left p{
    margin-top:20px;
    color:#6b7280;
    font-size:18px;
    line-height:1.7;
}

.hero-right{
    background:white;
    padding:35px;
    border-radius:22px;
    min-width:240px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.hero-right h2{
    font-size:55px;
    color:#2563eb;
}

.hero-right p{
    color:#6b7280;
    margin-top:10px;
    font-weight:600;
}

/* =========================
   CONTAINER
========================= */

.container{
    max-width:1300px;
    margin:auto;
    padding:0 25px 60px;
}

/* =========================
   FLASH MESSAGES
========================= */

.flash-success{
    background:#16a34a;
    color:white;
    padding:14px;
    border-radius:10px;
    margin-bottom:20px;
}

.flash-error{
    background:#dc2626;
    color:white;
    padding:14px;
    border-radius:10px;
    margin-bottom:20px;
}

/* =========================
   GRID
========================= */

.grid{
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:35px;
}

@media(max-width:1000px){
    .grid{
        grid-template-columns:repeat(2, 1fr);
    }
}

@media(max-width:700px){

    .hero{
        flex-direction:column;
        text-align:center;
    }

    .hero-left h1{
        font-size:45px;
    }

    .grid{
        grid-template-columns:1fr;
    }

    .navbar{
        padding:18px 20px;
    }

    .nav-links{
        display:none;
    }
}

/* =========================
   CARD
========================= */

.card{
    background:white;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:0.4s;
    position:relative;
}

.card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 45px rgba(0,0,0,0.15);
}

/* IMAGE */

.image-box{
    position:relative;
    overflow:hidden;
    background:#e5e7eb;
}

.image-box img,
.image-box video{
    width:100%;
    height:240px;
    object-fit:cover;
    transition:0.5s;
}

.card:hover img,
.card:hover video{
    transform:scale(1.08);
}

/* PLAY BUTTON */

.play-btn{
    position:absolute;
    top:15px;
    right:15px;
    background:rgba(255,255,255,0.9);
    width:55px;
    height:55px;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:22px;
    color:#2563eb;
    box-shadow:0 4px 15px rgba(0,0,0,0.15);
}

/* PRICE BADGE */

.price-badge{
    position:absolute;
    bottom:15px;
    left:15px;
    background:#2563eb;
    color:white;
    padding:10px 16px;
    border-radius:12px;
    font-weight:800;
    font-size:15px;
}

/* CONTENT */

.content{
    padding:22px;
}

.title{
    font-size:24px;
    font-weight:800;
    margin-bottom:10px;
}

.location{
    color:#6b7280;
    margin-bottom:16px;
    font-size:15px;
}

.description{
    color:#4b5563;
    line-height:1.7;
    margin-bottom:20px;
}

/* FORM */

form{
    margin-top:10px;
}

form input{
    width:100%;
    padding:12px;
    border-radius:10px;
    border:1px solid #d1d5db;
    margin-top:10px;
    outline:none;
}

form button{
    width:100%;
    margin-top:15px;
    padding:13px;
    border:none;
    border-radius:12px;
    background:#2563eb;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
    font-size:15px;
}

form button:hover{
    background:#1d4ed8;
}

/* BUTTON */

.btn{
    display:block;
    text-align:center;
    margin-top:15px;
    padding:13px;
    border-radius:12px;
    background:#111827;
    color:white;
    text-decoration:none;
    font-weight:bold;
    transition:0.3s;
}

.btn:hover{
    background:#2563eb;
}

/* EMPTY */

.empty{
    text-align:center;
    font-size:20px;
    color:#6b7280;
}

</style>
</head>
<body>

<!-- =========================
     NAVBAR
========================= -->

<div class="navbar">

    <div class="logo">
        🏠 GRADSTAY
    </div>

    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/listings" class="active">Listings</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </div>

    <a href="/login" class="login-btn">
        Sign In
    </a>

</div>

<!-- =========================
     HERO SECTION
========================= -->

<div class="hero">

    <div class="hero-left">

        <h1>
            Find Your <span>Perfect Stay</span>
        </h1>

        <p>
            Discover comfortable, verified and affordable student accommodation with modern living experience.
        </p>

    </div>

    <div class="hero-right">

        <h2>{{ $listings->count() }}+</h2>

        <p>Available Listings</p>

    </div>

</div>

<!-- =========================
     MAIN CONTENT
========================= -->

<div class="container">

    @if(session('success'))
        <div class="flash-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="flash-error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="flash-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="grid">

        @forelse($listings as $listing)

        <div class="card">

            <div class="image-box">

                {{-- IMAGE FILE --}}
                @if($listing->image)

                    <img src="{{ asset('uploads/images/'.$listing->image) }}">

                {{-- IMAGE URL --}}
                @elseif($listing->image_url)

                    <img src="{{ $listing->image_url }}">

                {{-- VIDEO FILE --}}
                @elseif($listing->video)

                    <video muted>
                        <source src="{{ asset('uploads/videos/'.$listing->video) }}">
                    </video>

                {{-- FALLBACK --}}
                @else

                    <img src="https://via.placeholder.com/500x350">

                @endif

                {{-- SHOW PLAY BUTTON IF VIDEO EXISTS --}}
                @if($listing->video || $listing->video_url)
                    <div class="play-btn">
                        ▶
                    </div>
                @endif

                <div class="price-badge">
                    Ksh {{ $listing->price }}
                </div>

            </div>

            <div class="content">

                <div class="title">
                    {{ $listing->title }}
                </div>

                <div class="location">
                    📍 {{ $listing->location }}
                </div>

                <div class="description">
                    {{ Str::limit($listing->description, 90) }}
                </div>

                <!-- BOOKING FORM -->

                <form method="POST" action="{{ route('bookings.store', $listing->id) }}">
                    @csrf

                    <input type="date" name="start_date" required>

                    <input type="date" name="end_date" required>

                    <button type="submit">
                        Book Now
                    </button>
                </form>

                <!-- VIEW DETAILS -->

                <a href="{{ route('listings.show', $listing->id) }}" class="btn">
                    View Details
                </a>

            </div>

        </div>

        @empty

        <p class="empty">
            No listings available yet.
        </p>

        @endforelse

    </div>

</div>

</body>
</html>