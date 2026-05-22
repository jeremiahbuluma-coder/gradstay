<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Payments - GRADSTAY</title>

<style>
*{
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, sans-serif;
}

body{
    margin:0;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:#fff;
}

.container{
    max-width:1200px;
    margin:50px auto;
    padding:20px;
}

h2{
    text-align:center;
    font-size:32px;
    margin-bottom:25px;
    color:#e2e8f0;
}

.table-box{
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(10px);
    border-radius:18px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,0.1);
    box-shadow:0 20px 50px rgba(0,0,0,0.5);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:linear-gradient(135deg,#2563eb,#7c3aed);
    padding:16px;
    text-align:left;
    text-transform:uppercase;
    font-size:13px;
    letter-spacing:0.5px;
}

td{
    padding:16px;
    border-bottom:1px solid rgba(255,255,255,0.08);
    color:#e5e7eb;
}

tr:hover td{
    background:rgba(255,255,255,0.05);
    transition:0.3s;
}

.badge{
    padding:7px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:700;
    text-transform:capitalize;
}

.pending{ background:#facc15; color:#000; }
.paid{ background:#22c55e; color:#fff; }
.rejected{ background:#ef4444; color:#fff; }

.btn{
    border:none;
    border-radius:10px;
    padding:9px 14px;
    cursor:pointer;
    font-size:13px;
    font-weight:600;
    transition:.3s;
}

.approve-btn{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:#fff;
}

.approve-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(34,197,94,0.3);
}

.reject-btn{
    background:linear-gradient(135deg,#ef4444,#b91c1c);
    color:#fff;
}

.reject-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(239,68,68,0.3);
}

.no-payments{
    text-align:center;
    padding:30px;
    color:#cbd5e1;
}

.success{
    background:#22c55e;
    padding:14px;
    border-radius:10px;
    margin-bottom:20px;
    text-align:center;
}

@media(max-width:768px){
    .table-box{ overflow-x:auto; }
    table{ min-width:900px; }
}
</style>
</head>

<body>

<div class="container">

    <h2>💳 Payment Management</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-box">

        <table>

            <tr>
                <th>User</th>
                <th>Listing</th>
                <th>Payment Method</th>
                <th>Transaction Code</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @forelse($bookings as $booking)

            <tr>

                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->listing->title }}</td>
                <td>{{ $booking->payment_method }}</td>
                <td>{{ $booking->payment_code }}</td>
                <td>Ksh {{ number_format($booking->total_price) }}</td>

                <td>
                    <span class="badge {{ $booking->payment_status }}">
                        {{ ucfirst($booking->payment_status) }}
                    </span>
                </td>

                <td>

                    <!-- APPROVE -->
                    <form method="POST"
                          action="{{ route('admin.payments.approve', $booking->id) }}"
                          style="display:inline;">

                        @csrf
                        <button type="submit" class="btn approve-btn">
                            Approve
                        </button>

                    </form>

                    <!-- REJECT -->
                    <form method="POST"
                          action="{{ route('admin.payments.reject', $booking->id) }}"
                          style="display:inline;">

                        @csrf
                        <button type="submit" class="btn reject-btn">
                            Reject
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" class="no-payments">
                    No payment records found.
                </td>
            </tr>

            @endforelse

        </table>

    </div>

</div>

</body>
</html>