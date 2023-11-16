<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
</head>
<body>

<h1>Formulaire de contact</h1>

<form action="" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <br>

    <label for="subject">Sujet :</label>
    <input type="text" id="subject" name="subject" required>

    <br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <br>

    <label for="message">Message :</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <br>

    <button type="submit">Envoyer</button>
</form>


</body>
</html>
