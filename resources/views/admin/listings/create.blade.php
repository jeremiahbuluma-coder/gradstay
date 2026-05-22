<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Create Listing - GRADSTAY</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

/* =========================
   YOUR ORIGINAL CSS (UNCHANGED)
========================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;

    background:
    radial-gradient(circle at top left, #c7d2fe, transparent 30%),
    radial-gradient(circle at bottom right, #ddd6fe, transparent 30%),
    linear-gradient(135deg,#eef2ff,#f8fafc);

    overflow-x:hidden;
}

.container{
    width:100%;
    max-width:980px;
    display:grid;
    grid-template-columns:1fr 320px;
    background:rgba(255,255,255,0.75);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.4);
    border-radius:30px;
    overflow:hidden;
    box-shadow:
    0 10px 30px rgba(0,0,0,0.06),
    0 25px 60px rgba(79,70,229,0.08);
    animation:fadeIn 0.7s ease;
}

.form-section{
    padding:55px;
}

.logo{
    font-size:32px;
    font-weight:700;
    color:#4f46e5;
    margin-bottom:25px;
}

h2{
    font-size:40px;
    color:#111827;
    margin-bottom:12px;
}

.subtitle{
    font-size:15px;
    color:#6b7280;
    margin-bottom:35px;
}

.form-group{
    margin-bottom:24px;
}

label{
    display:block;
    margin-bottom:10px;
    font-size:14px;
    font-weight:600;
    color:#374151;
}

input,
textarea{
    width:100%;
    padding:17px 18px;
    border:none;
    outline:none;
    border-radius:18px;
    background:#f9fafc;
    font-size:15px;
    box-shadow: inset 0 0 0 1px #e5e7eb;
}

input:focus,
textarea:focus{
    background:white;
    box-shadow:
    inset 0 0 0 2px #6366f1,
    0 10px 25px rgba(99,102,241,0.12);
}

textarea{
    min-height:150px;
    resize:none;
}

button{
    width:100%;
    padding:18px;
    border:none;
    border-radius:18px;
    background:linear-gradient(135deg,#4f46e5,#7c3aed);
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
}

button:hover{
    transform:translateY(-3px);
}

.side-panel{
    background:linear-gradient(180deg,#4f46e5,#7c3aed);
    padding:45px 30px;
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.side-panel h3{
    font-size:32px;
    margin-bottom:20px;
}

.side-panel p{
    font-size:14px;
    line-height:1.9;
}

.tip-box{
    background:rgba(255,255,255,0.12);
    padding:18px;
    border-radius:18px;
    margin-top:15px;
}

@media(max-width:850px){
    .container{
        grid-template-columns:1fr;
    }
    .side-panel{
        display:none;
    }
    .form-section{
        padding:35px;
    }
    h2{
        font-size:32px;
    }
}

</style>

</head>

<body>

<div class="container">

    <!-- LEFT SECTION -->
    <div class="form-section">

        <div class="logo">GRADSTAY</div>

        <h2>Create New Listing</h2>

        <p class="subtitle">
            Add a modern accommodation listing for students and alumni.
        </p>

        <form method="POST" action="{{ route('admin.listings.store') }}" enctype="multipart/form-data">

            @csrf

            <!-- TITLE -->
            <div class="form-group">
                <label>Property Title</label>
                <input type="text" name="title" required>
            </div>

            <!-- LOCATION -->
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" required>
            </div>

            <!-- PRICE -->
            <div class="form-group">
                <label>Price (Ksh)</label>
                <input type="number" name="price" required>
            </div>

            <!-- DESCRIPTION -->
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" required></textarea>
            </div>

            <!-- IMAGE FILE -->
            <div class="form-group">
                <label>Property Image (Upload)</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <!-- IMAGE URL -->
            <div class="form-group">
                <label>OR Image URL</label>
                <input type="text" name="image_url" placeholder="https://example.com/image.jpg">
            </div>

            <!-- VIDEO FILE -->
            <div class="form-group">
                <label>Video Upload</label>
                <input type="file" name="video" accept="video/*">
            </div>

            <!-- VIDEO URL -->
            <div class="form-group">
                <label>OR Video URL (YouTube or direct link)</label>
                <input
                    type="text"
                    name="video_url"
                    placeholder="https://www.youtube.com/watch?v=..."
                >
            </div>

            <!-- SUBMIT -->
            <button type="submit">
                Save Listing
            </button>

        </form>

    </div>

    <!-- RIGHT PANEL (UNCHANGED) -->
    <div class="side-panel">

        <h3>GRADSTAY</h3>

        <p>
            Build attractive property listings for students.
        </p>

        <div class="tip-box">✓ Upload Clear Photos</div>
        <div class="tip-box">✓ Accurate Location</div>
        <div class="tip-box">✓ Fair Pricing</div>

    </div>

</div>

</body>
</html>