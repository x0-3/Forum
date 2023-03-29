<h1>signUp form</h1>

<form action="index.php?ctrl=security&action=register" method="post" enctype="multipart/form-data">

    <input type="pseudo" name ="pseudo" placeholder="pseudo" required>

    <input type="file" name="avatar" id="avatar">


    <input type="email" name="email" placeholder="email" required>
    
    <input type="password" name="password" placeholder="password" required>

    <input type="password" name="confirmPassword" placeholder="confirm password" required>

    <button type="submit">valider</button>

</form>