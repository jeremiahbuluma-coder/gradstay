<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Listing - Landlord</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

body{
    font-family:'Poppins', sans-serif;
    background:linear-gradient(135deg,#eef2ff,#f8fafc);
    padding:30px;
}

/* CARD */
.box{
    background:white;
    max-width:600px;
    margin:auto;
    border-radius:20px;
    padding:35px;
    box-shadow:0 25px 70px rgba(0,0,0,0.10);
    border:1px solid rgba(99,102,241,0.08);
    animation:fadeIn 0.5s ease-in-out;
}

/* TITLE */
h2{
    margin-bottom:5px;
    color:#111827;
    font-size:26px;
    font-weight:700;
}

p{
    margin-top:0;
    font-size:13px;
    color:#6b7280;
}

/* LABEL */
label{
    display:block;
    margin-top:15px;
    font-size:13px;
    font-weight:600;
    color:#374151;
}

/* INPUTS */
input,textarea{
    width:100%;
    padding:13px;
    margin-top:6px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    font-size:14px;
    outline:none;
    transition:all 0.25s ease;
    background:#f9fafb;
}

input:focus, textarea:focus{
    border-color:#6366f1;
    background:white;
    box-shadow:0 0 0 4px rgba(99,102,241,0.12);
}

/* BUTTON */
button{
    width:100%;
    margin-top:22px;
    padding:14px;
    background:linear-gradient(135deg,#4f46e5,#7c3aed);
    color:white;
    border:none;
    border-radius:12px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(79,70,229,0.25);
}

/* INFO */
.info{
    margin-top:18px;
    font-size:12px;
    color:#6b7280;
    text-align:center;
}

/* SIMPLE FADE ANIMATION */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(10px);}
    to{opacity:1; transform:translateY(0);}
}

</style>

</head>

<body>

<div class="box">

    <h2>Create Listing</h2>
    <p>Add property details for students</p>

    <form method="POST" action="{{ route('landlord.listings.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Title</label>
        <input type="text" name="title" placeholder="e.g. Bedsitter in Kwa mueni" required>

        <label>Location</label>
        <input type="text" name="location" placeholder="e.g. Kitui, Kwa Mueni" required>

        <label>Price</label>
        <input type="number" name="price" placeholder="e.g. 2000" required>

        <label>Description</label>
        <textarea name="description" placeholder="Describe the property..." required></textarea>

        <!-- IMAGE -->
        <label>Property Image</label>
        <input type="file" name="image" accept="image/*">

        <!-- VIDEO -->
        <label>Video URL (YouTube)</label>
        <input type="text" name="video_url" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">

        <button type="submit">Save Listing</button>

    </form>

    <div class="info">
        Tip: Add clear images and a video to attract more students.
    </div>

</div>

</body>
</html>