<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Messages - GRADSTAY</title>

<style>

body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}

.container{
    max-width:1100px;
    margin:auto;
    padding:40px 20px;
}

h1{
    text-align:center;
    margin-bottom:30px;
    font-size:40px;
}

/* TABLE STYLE CARD */
.table{
    width:100%;
    border-collapse:collapse;
    background:rgba(255,255,255,0.06);
    border-radius:15px;
    overflow:hidden;
}

/* HEADER */
.table thead{
    background:rgba(56,189,248,0.15);
}

.table th{
    text-align:left;
    padding:15px;
    font-size:14px;
    color:#38bdf8;
    letter-spacing:1px;
}

/* ROWS */
.table td{
    padding:15px;
    border-top:1px solid rgba(255,255,255,0.05);
    vertical-align:top;
}

/* MESSAGE BOX */
.msg{
    background:#0f172a;
    padding:10px;
    border-radius:10px;
    line-height:1.5;
}

/* HOVER */
.table tbody tr:hover{
    background:rgba(255,255,255,0.05);
}

.empty{
    text-align:center;
    padding:50px;
    color:#94a3b8;
}

</style>
</head>

<body>

<div class="container">

    <h1>📩 Contact Messages</h1>

    @if($messages->count() > 0)

        <table class="table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message (Description)</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                @foreach($messages as $msg)

                    <tr>
                        <td>{{ $msg->name }}</td>

                        <td>{{ $msg->email }}</td>

                        <td>
                            <div class="msg">
                                {{ $msg->message }}
                            </div>
                        </td>

                        <td>
                            {{ $msg->created_at->format('d M Y') }}
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="empty">
            No messages yet 📭
        </div>

    @endif

</div>

</body>
</html>