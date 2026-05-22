<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact - GRADSTAY</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}

.container{
    max-width:1100px;
    margin:auto;
    padding:60px 20px;
}

.title{
    text-align:center;
    margin-bottom:50px;
}

.title h1{
    font-size:55px;
    margin-bottom:15px;
}

.title p{
    color:#cbd5e1;
}

/* CONTACT BOX */

.contact-box{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
}

.info,
.form-box{
    background:rgba(255,255,255,0.06);
    padding:40px;
    border-radius:20px;
}

.info h2,
.form-box h2{
    margin-bottom:20px;
    color:#38bdf8;
}

.info p{
    margin-bottom:20px;
    line-height:1.7;
    color:#cbd5e1;
}

/* FORM */

input,
textarea{
    width:100%;
    padding:14px;
    margin-bottom:18px;
    border:none;
    border-radius:10px;
    background:#e2e8f0;
}

textarea{
    resize:none;
    height:120px;
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#2563eb,#7c3aed);
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-3px);
}

/* RESPONSIVE */

@media(max-width:768px){

    .contact-box{
        grid-template-columns:1fr;
    }

    .title h1{
        font-size:40px;
    }

}

</style>
</head>

<body>
<!-- NAVBAR -->
<div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 40px;
    background:rgba(255,255,255,0.05);
    backdrop-filter: blur(10px);
    border-bottom:1px solid rgba(255,255,255,0.1);
">

    <!-- LOGO -->
    <div style="font-size:22px; font-weight:bold; color:#38bdf8;">
        GRADSTAY
    </div>

    <!-- LINKS -->
    <div style="display:flex; gap:25px;">

        <a href="/" 
           style="color:white; text-decoration:none; transition:0.3s;"
           onmouseover="this.style.color='#38bdf8'"
           onmouseout="this.style.color='white'">
           Home
        </a>

        <a href="/listings" 
           style="color:white; text-decoration:none; transition:0.3s;"
           onmouseover="this.style.color='#38bdf8'"
           onmouseout="this.style.color='white'">
           Listings
        </a>

        <a href="/about" 
           style="color:white; text-decoration:none; transition:0.3s;"
           onmouseover="this.style.color='#38bdf8'"
           onmouseout="this.style.color='white'">
           About
        </a>

        <a href="/contact" 
           style="color:#38bdf8; text-decoration:none; font-weight:bold; transition:0.3s;"
           onmouseover="this.style.color='#7c3aed'"
           onmouseout="this.style.color='#38bdf8'">
           Contact
        </a>

    </div>

</div>




<div class="container">

    <div class="title">
        <h1>Contact Us</h1>
        <p>We would love to hear from you</p>
    </div>

    <div class="contact-box">

        <div class="info">

            <h2>Get In Touch</h2>

            <p>
                Need help with accommodation or bookings?
                Reach out to the GRADSTAY support team.
            </p>

            <p><strong>Email:</strong> jeremiahbuluma.com</p>

            <p><strong>Phone:</strong> +254 706916118</p>

            <p><strong>Location:</strong> Kitui, Kenya</p>

        </div>

        <div class="form-box">

            <h2>Send Message</h2>

            <!-- ✅ FIXED FORM (IMPORTANT PART) -->
            <form method="POST" action="{{ route('contact.submit') }}">

    @csrf

    <div style="display:flex; flex-direction:column; gap:15px;">

        <!-- NAME -->
        <div>
            <label style="font-size:14px; color:#cbd5e1;">Full Name</label>
            <input 
                type="text" 
                name="name" 
                placeholder="Enter your full name"
                required
                style="
                    width:100%;
                    padding:15px;
                    border-radius:12px;
                    border:1px solid #334155;
                    background:#0f172a;
                    color:white;
                    outline:none;
                ">
        </div>

        <!-- EMAIL -->
        <div>
            <label style="font-size:14px; color:#cbd5e1;">Email Address</label>
            <input 
                type="email" 
                name="email" 
                placeholder="Enter your email"
                required
                style="
                    width:100%;
                    padding:15px;
                    border-radius:12px;
                    border:1px solid #334155;
                    background:#0f172a;
                    color:white;
                    outline:none;
                ">
        </div>

        <!-- MESSAGE -->
        <div>
            <label style="font-size:14px; color:#cbd5e1;">Message</label>
            <textarea 
                name="message" 
                placeholder="Write your message here..."
                required
                style="
                    width:100%;
                    padding:15px;
                    border-radius:12px;
                    border:1px solid #334155;
                    background:#0f172a;
                    color:white;
                    height:140px;
                    resize:none;
                    outline:none;
                "></textarea>
        </div>

        <!-- BUTTON -->
        <button 
            type="submit"
            style="
                padding:15px;
                border:none;
                border-radius:12px;
                background:linear-gradient(135deg,#2563eb,#7c3aed);
                color:white;
                font-weight:bold;
                cursor:pointer;
                transition:0.3s;
            "
            onmouseover="this.style.transform='scale(1.03)'"
            onmouseout="this.style.transform='scale(1)'"
        >
            Send Message 🚀
        </button>

    </div>

</form>

        </div>

    </div>

</div>

</body>
</html>