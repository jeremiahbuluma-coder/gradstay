<!DOCTYPE html>
<html>
<head>
<title>Edit Listing</title>

<style>
body{font-family:Segoe UI;background:#f4f6fb;padding:30px;}

.box{
    background:white;
    padding:20px;
    max-width:500px;
    margin:auto;
}
input{
    width:100%;
    padding:10px;
    margin-bottom:10px;
}
button{
    background:green;
    color:white;
    padding:10px;
    border:none;
}
</style>

</head>

<body>

<div class="box">

<h2>Edit Listing</h2>

<form method="POST" action="{{ route('landlord.listings.update', $listing->id) }}">
@csrf
@method('PUT')

<input type="text" name="title" value="{{ $listing->title }}">
<input type="text" name="location" value="{{ $listing->location }}">
<input type="number" name="price" value="{{ $listing->price }}">

<button>Update</button>

</form>

</div>

</body>
</html>