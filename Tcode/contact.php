<!DOCTYPE html>
<?php include 'index.php';?>

<html>
<head>
<h1>asdghfdhf</h1>
<body>
<form action="mail.php" method="POST">
<p>Name</p> <input type="text" name="name">
<p>Email</p> <input type="text" name="email">
<p>Phone</p> <insput type="text" name="phone">
<p>Dropdown Box</p>
<select name="dropdown" size="1">
<option value="Option1">Option1</option>
<option value="Option2">Option2</option>
<option value="Option3">Option3</option>
<option value="Option4">Option4</option>
</select>
<br />
<p>Message</p><textarea name="message" rows="6" cols="25"></textarea><br />
<input type="submit" value="Send"><input type="reset" value="Clear">
</form>
</body>
</head>
</html>
