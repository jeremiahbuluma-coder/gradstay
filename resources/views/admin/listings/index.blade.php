<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Listings - GRADSTAY</title>

<style>
*{
    box-sizing:border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    margin:0;
    background: linear-gradient(135deg, #eef2f7, #dbeafe);
    min-height:100vh;
}

/* CONTAINER */
.container{
    max-width:1100px;
    margin:40px auto;
    padding:20px;
}

/* HEADER */
h2{
    font-size:28px;
    margin-bottom:15px;
    color:#111827;
}

/* CREATE BUTTON */
.create{
    display:inline-block;
    margin-bottom:18px;
    padding:10px 16px;
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color:white;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
    box-shadow:0 8px 20px rgba(34,197,94,0.25);
}

.create:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 25px rgba(34,197,94,0.35);
}

/* TABLE WRAPPER */
.table-box{
    background:white;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background: linear-gradient(135deg, #111827, #1f2937);
    color:white;
    padding:14px;
    text-align:left;
    font-size:14px;
    letter-spacing:0.5px;
}

td{
    padding:14px;
    border-bottom:1px solid #eee;
    font-size:14px;
    color:#374151;
}

/* ROW HOVER */
tr:hover td{
    background:#f3f4f6;
    transition:0.2s;
}

/* IMAGE STYLE */
.table-img{
    width:80px;
    height:60px;
    object-fit:cover;
    border-radius:8px;
    border:1px solid #e5e7eb;
}

/* ACTION BUTTONS */
.btn{
    padding:6px 10px;
    border-radius:8px;
    font-size:13px;
    text-decoration:none;
    font-weight:600;
    display:inline-block;
    margin-right:5px;
    transition:0.3s;
}

/* EDIT */
.edit-btn{
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color:white;
}

.edit-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 15px rgba(37,99,235,0.3);
}

/* DELETE */
.delete-btn{
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color:white;
    border:none;
    cursor:pointer;
}

.delete-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 15px rgba(220,38,38,0.3);
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
    }

    td:before{
        position:absolute;
        left:15px;
        font-weight:bold;
        color:#111827;
    }
}
</style>

</head>

<body>

<div class="container">

    <h2>📋 Listings Dashboard</h2>

    <a href="{{ route('admin.listings.create') }}" class="create">
        + Create New Listing
    </a>

    <div class="table-box">

        <table>

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Location</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            @foreach($listings as $listing)
            <tr>

                <td>{{ $listing->id }}</td>
                <td>{{ $listing->title }}</td>
                <td>{{ $listing->location }}</td>
                <td>Ksh {{ $listing->price }}</td>

                <td>
                    @if($listing->image)
                        <img src="{{ asset('storage/' . $listing->image) }}" class="table-img">
                    @else
                        <span style="color:#9ca3af;">No Image</span>
                    @endif
                </td>

                <td>

                    <a href="{{ route('admin.listings.edit', $listing->id) }}"
                       class="btn edit-btn">
                        Edit
                    </a>

                    <form action="{{ route('admin.listings.destroy', $listing->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn delete-btn"
                                onclick="return confirm('Delete this listing?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>
            @endforeach

        </table>

    </div>

</div>

</body>
</html>