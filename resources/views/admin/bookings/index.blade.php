<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Requests - GRADSTAY</title>

<style>
*{
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, sans-serif;
}

body{
    margin:0;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color:#fff;
}

/* CONTAINER */
.container{
    max-width:1100px;
    margin:50px auto;
    padding:20px;
}

/* TITLE */
h2{
    font-size:30px;
    margin-bottom:20px;
    text-align:center;
    letter-spacing:1px;
    color:#e2e8f0;
}

/* TABLE WRAPPER */
.table-box{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(10px);
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 20px 50px rgba(0,0,0,0.5);
    border:1px solid rgba(255,255,255,0.1);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

/* HEADER */
th{
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    padding:15px;
    text-align:left;
    font-size:14px;
    letter-spacing:0.5px;
    text-transform:uppercase;
}

/* ROWS */
td{
    padding:15px;
    border-bottom:1px solid rgba(255,255,255,0.08);
    color:#e5e7eb;
    font-size:14px;
}

/* ROW HOVER */
tr:hover td{
    background: rgba(255,255,255,0.05);
    transition:0.3s;
}

/* STATUS BADGES */
.badge{
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    text-transform:capitalize;
}

/* STATUS COLORS */
.pending{
    background:#facc15;
    color:#000;
}

.confirmed{
    background:#22c55e;
    color:#fff;
}

.cancelled{
    background:#ef4444;
    color:#fff;
}

/* RESPONSIVE */
@media (max-width:768px){
    table, thead, tbody, th, td, tr{
        display:block;
    }

    th{
        position:absolute;
        left:-9999px;
    }

    td{
        position:relative;
        padding-left:50%;
        border-bottom:1px solid rgba(255,255,255,0.1);
    }

    td:before{
        position:absolute;
        left:15px;
        font-weight:bold;
        color:#93c5fd;
    }
}
</style>

</head>

<body>

<div class="container">

<h2>📩 Booking Requests</h2>

<div class="table-box">

<table>

<tr>
    <th>User</th>
    <th>Listing</th>
    <th>Status</th>
    <th>Payment</th>
</tr>

@foreach($bookings as $booking)
<tr>

    <td>{{ $booking->user->name }}</td>

    <td>{{ $booking->listing->title }}</td>

    <td>
        <span class="badge {{ $booking->status }}">
            {{ ucfirst($booking->status) }}
        </span>
    </td>

    <td>

        @if($booking->payment_status == 'paid')

            <span style="color:#22c55e; font-weight:600;">
                Paid ✔
            </span>

        @elseif($booking->payment_status == 'pending')

            <span style="color:#facc15; font-weight:600;">
                Pending Payment
            </span>

        @else

            <span style="color:#ef4444; font-weight:600;">
                Not Paid
            </span>

        @endif

    </td>

</tr>
@endforeach

</table>

</div>

</div>

</body>
</html>