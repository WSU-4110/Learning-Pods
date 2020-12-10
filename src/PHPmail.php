<?php



$robo = 'robot@learnigpods.com';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
SELECT referees.name, referees.email, events.date, events.name FROM referees
JOIN events_lut ON referees.id = events_lut.ref_id
JOIN events ON events_lut.evt_id = events.id
WHERE 'events.date'=CURRENT_DATE+ INTERVAL 7 DAY
OR 'events.date'=CURRENT_DATE+ INTERVAL 1 DAY

$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
    $mailer->SMTPOptions = [
        'ssl'=> [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ];
    }


    $mailer->Host = 'mail.learningpods.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'robot@learningpods.com';
    $mailer->Password = 'password';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;

    $mailer->setFrom('donotreplay@learningpods.com', 'Name of sender');
    $mailer->addAddress('example@learningpods.com', 'Name of recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'Learningpods Notifiaction';
    $mailer->Body = 'This is a reminder that you have an appointment on [DATE] at [TIME]';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
