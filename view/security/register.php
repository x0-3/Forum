<h1>signUp form</h1>

<?php
var_dump($_POST);
?>
<form action="index.php?ctrl=security&action=register" method="post" enctype="multipart">

    <input type="pseudo" name ="pseudo" placeholder="pseudo" required>
    
    <input type="email" name="email" placeholder="email" required>
    
    <input type="password" name="password" placeholder="password" required>

    <input type="password" name="confirmPassword" placeholder="confirm password" required>

    <button type="submit">valider</button>

</form>