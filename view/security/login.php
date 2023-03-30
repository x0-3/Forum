<section class="connection">

    <div class="connection_form">
        <h1>sign In</h1>


        <form action="index.php?ctrl=security&action=login" method="post">

            <input type="text" name="pseudo" id="pseudo" placeholder="pseudo" required>
            
            <input type="password" name="password" id="password" placeholder="password" required>
            
            <button type="submit">sign In</button>
            
            <a href="index.php?ctrl=security&action=registerForm">Sign Up</a>
        </form>

    </div>
</section>

