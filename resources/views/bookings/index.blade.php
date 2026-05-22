<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Bookings - GRADSTAY</title>

<style>
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:#f1f5f9;
}

.header{
    background:linear-gradient(135deg,#0ea5e9,#1d4ed8);
    color:white;
    padding:25px;
    text-align:center;
    font-size:28px;
    font-weight:bold;
}

.container{
    max-width:1100px;
    margin:auto;
    padding:30px 20px;
}

.top-btn{
    margin-bottom:20px;
}

.top-btn a{
    text-decoration:none;
    background:#0f172a;
    color:white;
    padding:12px 18px;
    border-radius:10px;
    font-weight:bold;
}

.grid{
    display:grid;
    gap:20px;
}

.card{
    background:white;
    border-radius:18px;
    padding:22px;
    box-shadow:0 10px 25px rgba(0,0,0,0.07);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.title{
    font-size:24px;
    font-weight:bold;
    color:#0f172a;
    margin-bottom:8px;
}

.row{
    margin:8px 0;
    color:#475569;
}

.price{
    color:#2563eb;
    font-size:22px;
    font-weight:bold;
    margin-top:10px;
}

.status{
    display:inline-block;
    margin-top:12px;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
    color:white;
}

.pending{ background:#f59e0b; }
.confirmed{ background:#10b981; }
.cancelled{ background:#ef4444; }

.empty{
    text-align:center;
    background:white;
    padding:40px;
    border-radius:15px;
    color:#64748b;
    font-size:18px;
}
</style>

</head>
<body>

<div class="header">📦 My Bookings - GRADSTAY</div>

<div class="container">

<div class="top-btn">
<a href="{{ route('dashboard') }}">⬅ Back Dashboard</a>
</div>

@if($bookings->count())

<div class="grid">

@foreach($bookings as $booking)

<div class="card">

<div class="title">
{{ $booking->listing->title ?? 'Accommodation' }}
</div>

<div class="row">📍 {{ $booking->listing->location ?? 'Location' }}</div>

<div class="row">📅 Start: {{ $booking->start_date }}</div>

<div class="row">📅 End: {{ $booking->end_date }}</div>

<div class="price">
Ksh {{ $booking->listing->price ?? 0 }}
</div>

<div class="status {{ $booking->status }}">
{{ ucfirst($booking->status) }}
</div>

</div>

@endforeach

</div>

@else

<div class="empty">
No bookings yet.<br><br>
Book a room to see it here.
</div>

@endif

</div>

</body>
</html>