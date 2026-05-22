<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Listing - GRADSTAY</title>

<style>
*{
    box-sizing:border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    margin:0;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #1f2937, #111827);
}

/* CARD */
.box{
    width:100%;
    max-width:540px;
    background:rgba(255,255,255,0.95);
    padding:35px;
    border-radius:18px;
    box-shadow:0 20px 60px rgba(0,0,0,0.35);
    backdrop-filter: blur(10px);
    animation: fadeIn 0.6s ease-in-out;
}

/* TITLE */
h2{
    text-align:center;
    margin-bottom:25px;
    font-size:26px;
    color:#111827;
    letter-spacing:0.5px;
}

/* BACK LINK */
a{
    display:inline-block;
    margin-bottom:18px;
    text-decoration:none;
    color:#4f46e5;
    font-weight:600;
    transition:0.3s;
}

a:hover{
    color:#3730a3;
    transform: translateX(-3px);
}

/* INPUTS */
input{
    width:100%;
    padding:13px 14px;
    margin-bottom:16px;
    border:1px solid #d1d5db;
    border-radius:10px;
    font-size:14px;
    background:#f9fafb;
    transition:0.3s;
}

input:focus{
    border-color:#4f46e5;
    background:#fff;
    box-shadow:0 0 0 4px rgba(79,70,229,0.15);
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:13px;
    border:none;
    border-radius:10px;
    font-size:15px;
    font-weight:600;
    color:white;
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    cursor:pointer;
    transition:0.3s ease;
}

button:hover{
    transform: translateY(-2px);
    box-shadow:0 12px 25px rgba(124,58,237,0.35);
}

button:active{
    transform: scale(0.98);
}

/* ANIMATION */
@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* SMALL SCREEN */
@media (max-width:600px){
    .box{
        margin:20px;
        padding:25px;
    }
}
</style>

</head>

<body>

<div class="box">

    <a href="{{ route('admin.listings.index') }}">← Back to Listings</a>

    <h2>Edit Listing</h2>

    <form method="POST" action="{{ route('admin.listings.update', $listing->id) }}">

        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $listing->title }}" placeholder="Listing Title" required>

        <input type="text" name="location" value="{{ $listing->location }}" placeholder="Location" required>

        <input type="number" name="price" value="{{ $listing->price }}" placeholder="Price (KSH)" required>

        <button type="submit">Update Listing</button>

    </form>

</div>

</body>
</html>