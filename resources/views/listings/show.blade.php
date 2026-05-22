<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $listing->title }} - GRADSTAY</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

/* =========================
   RESET
========================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;
    background:
    radial-gradient(circle at top left,#dbeafe,transparent 25%),
    radial-gradient(circle at bottom right,#ede9fe,transparent 25%),
    linear-gradient(135deg,#f8fafc,#eef2ff);
    color:#111827;
    min-height:100vh;
}

/* =========================
   NAVBAR
========================= */

.navbar{
    width:100%;
    padding:20px 60px;
    background:rgba(255,255,255,0.75);
    backdrop-filter:blur(15px);
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 8px 30px rgba(0,0,0,0.05);
    position:sticky;
    top:0;
    z-index:100;
}

.logo{
    font-size:30px;
    font-weight:800;
    color:#4f46e5;
}

.nav-links{
    display:flex;
    gap:35px;
}

.nav-links a{
    text-decoration:none;
    color:#374151;
    font-weight:600;
    transition:0.3s;
}

.nav-links a:hover{
    color:#4f46e5;
}

.active{
    color:#4f46e5 !important;
}

.login-btn{
    background:linear-gradient(135deg,#4f46e5,#7c3aed);
    color:white;
    padding:12px 22px;
    border-radius:14px;
    text-decoration:none;
    font-weight:600;
    box-shadow:0 10px 25px rgba(79,70,229,0.25);
}

/* =========================
   WRAPPER
========================= */

.wrapper{
    max-width:1350px;
    margin:40px auto;
    padding:0 20px;
}

/* =========================
   HERO IMAGE
========================= */

.hero-image{
    width:100%;
    height:560px;
    border-radius:32px;
    overflow:hidden;
    position:relative;
    box-shadow:
    0 15px 35px rgba(0,0,0,0.08),
    0 30px 80px rgba(79,70,229,0.15);
    background:#e5e7eb;
}

.hero-image img,
.hero-image video{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

.overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to top,rgba(0,0,0,0.45),transparent);
}

/* =========================
   CONTENT GRID
========================= */

.content{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:35px;
    margin-top:35px;
}

/* =========================
   CARDS
========================= */

.left-side,
.right-side{
    background:rgba(255,255,255,0.78);
    backdrop-filter:blur(16px);
    border-radius:28px;
    padding:35px;
    box-shadow:
    0 10px 40px rgba(0,0,0,0.06),
    0 25px 60px rgba(79,70,229,0.08);
}

/* =========================
   TITLE SECTION
========================= */

.title{
    font-size:48px;
    font-weight:800;
    line-height:1.2;
    color:#111827;
    margin-bottom:12px;
}

.location{
    font-size:17px;
    color:#6b7280;
    margin-bottom:30px;
    display:flex;
    align-items:center;
    gap:8px;
}

.description{
    font-size:16px;
    line-height:2;
    color:#374151;
}

/* =========================
   VIDEO SECTION
========================= */

.video-section{
    margin-top:45px;
}

.video-title{
    font-size:26px;
    font-weight:800;
    margin-bottom:18px;
    color:#111827;
}

.video-box{
    overflow:hidden;
    border-radius:24px;
    background:#f3f4f6;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.video-box video,
.video-box iframe{
    width:100%;
    display:block;
}

.no-video{
    padding:60px 20px;
    text-align:center;
    color:#6b7280;
    font-weight:600;
    font-size:15px;
}

/* =========================
   BOOKING CARD
========================= */

.booking-title{
    font-size:30px;
    font-weight:800;
    margin-bottom:18px;
    color:#111827;
}

.price{
    font-size:42px;
    font-weight:800;
    color:#4f46e5;
    margin-bottom:25px;
}

.small-text{
    font-size:14px;
    color:#6b7280;
    margin-bottom:25px;
}

/* FORM */

form input{
    width:100%;
    padding:16px;
    border:none;
    border-radius:16px;
    margin-bottom:18px;
    background:#f9fafb;
    box-shadow:inset 0 0 0 1px #e5e7eb;
    font-size:15px;
    outline:none;
}

form input:focus{
    background:white;
    box-shadow:
    inset 0 0 0 2px #6366f1,
    0 8px 20px rgba(99,102,241,0.12);
}

form button{
    width:100%;
    padding:17px;
    border:none;
    border-radius:18px;
    background:linear-gradient(135deg,#4f46e5,#7c3aed);
    color:white;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
    transition:0.3s;
    box-shadow:0 12px 30px rgba(79,70,229,0.25);
}

form button:hover{
    transform:translateY(-3px);
}

/* BACK BUTTON */

.btn{
    display:block;
    margin-top:18px;
    text-align:center;
    padding:16px;
    border-radius:18px;
    background:#111827;
    color:white;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
}

.btn:hover{
    background:#4f46e5;
}

/* SELECT */

select{
    width:100%;
    padding:16px;
    border:none;
    border-radius:16px;
    margin-bottom:18px;
    background:#f9fafb;
    box-shadow:inset 0 0 0 1px #e5e7eb;
    font-size:15px;
    outline:none;
}

/* RESPONSIVE */

@media(max-width:950px){

    .content{
        grid-template-columns:1fr;
    }

    .hero-image{
        height:380px;
    }

    .title{
        font-size:34px;
    }

    .navbar{
        padding:18px 20px;
    }

    .nav-links{
        display:none;
    }
}

</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">GRADSTAY</div>

    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/listings" class="active">Listings</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </div>

    <a href="/login" class="login-btn">Sign In</a>

</div>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HERO IMAGE -->
    <div class="hero-image">

        @if($listing->image)

            <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}">

        @elseif($listing->image_url)

            <img src="{{ $listing->image_url }}" alt="{{ $listing->title }}">

        @elseif($listing->video)

            <video controls autoplay muted>
                <source src="{{ asset('storage/' . $listing->video) }}">
            </video>

        @else

            <img src="https://via.placeholder.com/1400x700">

        @endif

        <div class="overlay"></div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- LEFT SIDE -->
        <div class="left-side">

            <div class="title">{{ $listing->title }}</div>

            <div class="location">📍 {{ $listing->location }}</div>

            <div class="description">{{ $listing->description }}</div>

            <!-- VIDEO SECTION -->
            <div class="video-section">

                <div class="video-title">🎥 Property Video Tour</div>

                <div class="video-box">

                    @if($listing->video)

                        <video controls>
                            <source src="{{ asset('storage/' . $listing->video) }}">
                        </video>

                    @elseif(!empty($listing->video_url))

                        @php
                            $videoId = null;

                            if (str_contains($listing->video_url, 'watch?v=')) {
                                $videoId = explode('watch?v=', $listing->video_url)[1];
                                $videoId = explode('&', $videoId)[0];
                            }
                            elseif (str_contains($listing->video_url, 'youtu.be/')) {
                                $videoId = explode('youtu.be/', $listing->video_url)[1];
                            }
                            elseif (str_contains($listing->video_url, 'embed/')) {
                                $videoId = explode('embed/', $listing->video_url)[1];
                            }
                        @endphp

                        @if($videoId)

                            <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                                height="450"
                                style="border:none;"
                                allowfullscreen>
                            </iframe>

                        @else

                            <video controls>
                                <source src="{{ $listing->video_url }}">
                            </video>

                        @endif

                    @else

                        <div class="no-video">
                            No video available for this listing
                        </div>

                    @endif

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
<div class="right-side">

    <div class="booking-title">Book This Stay</div>

    <div class="price">
        Ksh {{ number_format($listing->price) }}
    </div>

    <div class="small-text">
        Secure your accommodation quickly and easily.
    </div>

    @if(session('success'))
    <div style="
        background:#dcfce7;
        color:#166534;
        padding:15px;
        border-radius:12px;
        margin-bottom:20px;
        font-weight:600;
    ">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="
        background:#fee2e2;
        color:#991b1b;
        padding:15px;
        border-radius:12px;
        margin-bottom:20px;
        font-weight:600;
    ">
        {{ session('error') }}
    </div>
@endif
    <form method="POST" action="{{ route('bookings.store', $listing->id) }}">

        @csrf

        <input type="date" name="start_date" required>

        <input type="date" name="end_date" required>

        <input
            type="text"
            name="phone"
            placeholder="Enter M-Pesa Number (07...)"
            required
        >

        <!-- PAYMENT POPUP -->
        <div style="
            background:linear-gradient(135deg,#4f46e5,#7c3aed);
            padding:22px;
            border-radius:20px;
            color:white;
            margin-bottom:20px;
            box-shadow:0 12px 25px rgba(79,70,229,0.25);
        ">

            <div style="
                font-size:22px;
                font-weight:700;
                margin-bottom:12px;
            ">
                💳 M-Pesa Payment
            </div>

            <div style="
                font-size:15px;
                line-height:2;
                opacity:0.96;
            ">

                After clicking the button below,
                an M-Pesa payment prompt will be sent
                to your phone automatically.

                <br><br>

                Enter your M-Pesa PIN to complete payment.

                <br><br>

                <strong>Amount:</strong>
                Ksh {{ number_format($listing->price) }}

                <br><br>

                ✅ Booking will be confirmed automatically after successful payment.

            </div>

        </div>

        <button type="submit">
            Book & Pay with M-Pesa
        </button>

    </form>

    <a href="/listings" class="btn">
         Back to Listings
    </a>

</div>

    </div>

</div>

</body>
</html>