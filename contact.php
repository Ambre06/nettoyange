<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des données
    if (!empty($lastname) && !empty($firstname) && !empty($email) && !empty($phone) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Préparation de l'email
            $to = "contact@nettoyange.fr"; // Remplacez par votre adresse email
            $subject = "Nouveau message de contact de $firstname $lastname";
            $body = "Nom: $lastname\nPrénom: $firstname\nEmail: $email\nTéléphone: $phone\n\nMessage:\n$message";
            $headers = "From: $email";

            // Envoi de l'email
            if (mail($to, $subject, $body, $headers)) {
                echo "Votre message a été envoyé avec succès.";
            } else {
                echo "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
            }
        } else {
            echo "L'adresse email fournie est invalide.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
} else {
    echo "Méthode de requête non supportée.";
}
?>
 -->
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = "contact@nettoyange.fr"; // Remplace par ton adresse email
    $subject = "Nouveau message de contact de " . $firstname . " " . $lastname;
    $body = "Nom : $lastname\nPrénom : $firstname\nEmail : $email\nTéléphone : $phone\n\nMessage :\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
    }
}
?>
