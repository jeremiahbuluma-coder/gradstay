<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRADSTAY - Users</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f5f6fa;
        }

        .container{
            padding:20px;
        }

        h2{
            margin-bottom:15px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:#fff;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
        }

        th, td{
            padding:12px;
            text-align:left;
            border-bottom:1px solid #eee;
        }

        th{
            background:#2f3640;
            color:#fff;
        }

        tr:hover{
            background:#f1f2f6;
        }

        .badge{
            padding:4px 10px;
            border-radius:20px;
            font-size:12px;
            color:#fff;
            display:inline-block;
        }

        .admin{
            background:#e74c3c;
        }

        .landlord{
            background:#3498db;
        }

        .user{
            background:#2ecc71;
        }

    </style>
</head>

<body>

<div class="container">

    <h2>All Users</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Joined</th>
            <th>Action</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            <!-- ROLE -->
            <td>
                @if($user->role == 'admin')
                    <span class="badge admin">Admin</span>

                @elseif($user->role == 'landlord')
                    <span class="badge landlord">Landlord</span>

                @else
                    <span class="badge user">User</span>
                @endif
            </td>

            <td>{{ $user->created_at }}</td>

            <!-- DELETE ACTION (ONLY ADDITION) -->
            <td>
                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this user?')">

                    @csrf
                    @method('DELETE')

                    <button style="
                        background:#e74c3c;
                        color:white;
                        border:none;
                        padding:6px 12px;
                        border-radius:5px;
                        cursor:pointer;
                    ">
                        Delete
                    </button>

                </form>
            </td>

        </tr>
        @endforeach

    </table>

</div>

</body>
</html>