<?php

    // récupération des variables d'URL
    var_dump($_POST);

?>


<form method="post">

    <p>
        <label>Email :</label>
        <input type="email" name="email">
    </p>

    <p>
        <label>Subject : </label>
        <input type="text" name="subject">
    </p>

    <p>
        <label>Message :</label><br>
        <textarea name="message"></textarea>
    </p>

    <p>
        <input type="submit" name="submit">
    </p>

</form>