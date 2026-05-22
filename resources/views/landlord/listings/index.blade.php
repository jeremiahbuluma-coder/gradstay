<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Listings - GRADSTAY</title>

<style>
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:#f1f5f9;
}

.header{
    background:linear-gradient(135deg,#0f172a,#1e3a8a);
    color:white;
    padding:25px;
    text-align:center;
    font-size:28px;
    font-weight:bold;
}

.container{
    max-width:1200px;
    margin:auto;
    padding:30px 20px;
}

.top-actions{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.btn{
    padding:12px 18px;
    text-decoration:none;
    border-radius:10px;
    font-weight:bold;
    color:white;
}

.add-btn{
    background:#10b981;
}

.back-btn{
    background:#3b82f6;
}

.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
}

.card{
    background:white;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.image{
    height:200px;
    background:url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80');
    background-size:cover;
    background-position:center;
}

.content{
    padding:20px;
}

.title{
    font-size:22px;
    font-weight:bold;
    margin-bottom:8px;
    color:#0f172a;
}

.location{
    color:#64748b;
    margin-bottom:10px;
}

.price{
    color:#2563eb;
    font-size:24px;
    font-weight:bold;
    margin-bottom:18px;
}

.actions{
    display:flex;
    gap:10px;
}

.edit{
    flex:1;
    background:#f59e0b;
    color:white;
    text-align:center;
    padding:10px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}

.delete{
    flex:1;
    background:#ef4444;
    color:white;
    border:none;
    border-radius:10px;
    font-weight:bold;
    cursor:pointer;
}

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

<div class="header">🏠 My Listings - GRADSTAY</div>

<div class="container">

<div class="top-actions">
    <a href="{{ route('landlord.dashboard') }}" class="btn back-btn">⬅ Dashboard</a>
    <a href="{{ route('landlord.listings.create') }}" class="btn add-btn">➕ Add Listing</a>
</div>

@if(session('success'))
<div style="background:#dcfce7;color:#166534;padding:15px;border-radius:10px;margin-bottom:20px;">
    {{ session('success') }}
</div>
@endif

@if($listings->count())

<div class="grid">

@foreach($listings as $listing)

<div class="card">

<div class="image"></div>

<div class="content">

<div class="title">{{ $listing->title }}</div>

<div class="location">📍 {{ $listing->location }}</div>

<div class="price">Ksh {{ $listing->price }}</div>

<div class="actions">

<a href="{{ route('landlord.listings.edit',$listing->id) }}" class="edit">
✏ Edit
</a>

<form method="POST" action="{{ route('landlord.listings.destroy',$listing->id) }}" style="flex:1;">
@csrf
@method('DELETE')

<button class="delete" onclick="return confirm('Delete listing?')">
🗑 Delete
</button>
</form>

</div>

</div>
</div>

@endforeach

</div>

@else

<div class="empty">
No listings yet.<br><br>
Create your first property now.
</div>

@endif

</div>

</body>
</html>