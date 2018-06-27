<?php
include 'connectDB.php';

function sendEmail($mail, $passowrd)
{
    $to = $mail;
    $subject = 'ETIC INSA Technologies : Ajout Annuaire';
    $message = 'Vous avez été ajouté à l\'annuaire des anciens d\'ETIC INSA Technologies\n
                Votre mot de passe actuel est : ' . $passowrd .'\n
                Il vous est posssible d\'accéder à vos informations et de modifier votre mot de passe en suivant le lien suivant : \n';
    $headers = 'From: admin@etic-insa.com';

    mail($to, $subject, $message, $headers);
}