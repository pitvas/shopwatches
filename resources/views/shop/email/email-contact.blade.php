<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Order to call</h1>
	<p><b>Name</b>:{{ $name }}</p>
	<p><b>Phone</b>:{{ $phone }}</p>
	@if($email)
	<p><b>Email</b>:{{ $email }}</p>
	@endif
	@if($msg)
	<p><b>Message</b>:{{ $msg }}</p>
	@endif
</body>
</html>