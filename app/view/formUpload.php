<html>
<body>


<!-- multipart - faz com que o form mande, além do POST, o FILES-->
<form action="gravaupload.php" method="post" enctype="multipart/form-data">

    <input type="text" name="nome">

    <input type="file" name="icone">

    <input type="submit">

</form>
</body>
</html>