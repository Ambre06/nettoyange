<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire en toute sécurité
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telephone = isset($_POST['telephone']) ? htmlspecialchars(trim($_POST['telephone'])) : '';
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des champs obligatoires
    if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("L'adresse email n'est pas valide.");
    }

    // Préparer l'email
    $to = "contact@nettoyange.fr"; // Remplacez par votre adresse email
    $subject = "Nouveau message depuis le site web";
    $body = "Nom : $nom\n";
    $body .= "Prénom : $prenom\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $telephone\n\n";
    $body .= "Message :\n$message\n";
    $headers = "From: $email";

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Merci pour votre message. Nous vous répondrons dès que possible.";
    } else {
        echo "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
    }
} else {
    // Si le script est accédé sans passer par le formulaire
    die("Accès direct non autorisé.");
}
?>
