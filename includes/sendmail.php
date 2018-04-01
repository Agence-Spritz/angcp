<?php include "../admin/inc/openDB.txt";
list($mail1) = mysqli_fetch_array(mysqli_query($link, "SELECT mail1 FROM angcp_divers WHERE ID=1 "));

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();

$message = "";
$status = "false";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['form_name'] != '' AND $_POST['form_email'] != '' AND $_POST['form_subject'] != '' ) {

        $name = $_POST['form_name'];
        $email = $_POST['form_email'];
        $subject = $_POST['form_subject'];
        $phone = $_POST['form_phone'];
        $message = $_POST['form_message'];
        
        $type = "Contact";
        

        $subject = isset($subject) ? $subject : 'Demande de contact';

        $botcheck = $_POST['form_botcheck'];

        $toemail = $mail1; // Your Email Address
        $toname = 'ANGCP'; // Your Name

        if( $botcheck == '' ) {

            $mail->SetFrom( $email , $name );
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;
            $mail->CharSet = 'UTF-8';

            $name_mail = isset($name) ? "Nom: $name<br><br>" : '';
            $email_mail = isset($email) ? "Email: $email<br><br>" : '';
            $phone_mail = isset($phone) ? "Télélphone: $phone<br><br>" : '';
            $message_mail = isset($message) ? "Message: $message<br><br>" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>Ce message vous a été envoyé depuis : ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name_mail $email_mail $phone_mail $message_mail $referrer";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();
            
            // ENREGISTREMENT DES FORMULAIRES DANS UNE TABLE
			$dbu=date('Y-m-d H:i:s');
			
			$resultat_ins = mysqli_query ($link, "INSERT INTO ".$table_prefix."_contact ( `ID` , `type` ,`nom` ,`email` , `tel` , `dbu` , `message` )
				VALUES ('' , '$type', '$name', '$email', '$phone',  '$dbu', '$body') ");
			
			
            if( $sendEmail == true ):
                $message = 'Nous avons <strong>correctement</strong> reçu votre message, nous vous recontacterons dans les meilleurs délais.';
                $status = "true";
            else:
                $message = 'Votre message <strong>ne peut pas</strong> être envoyé suite à une erreur inattendue. Merci de bien vouloir réessayer.<br /><br /><strong>Cause éventuelle:</strong><br />' . $mail->ErrorInfo . '';
                $status = "false";
            endif;
        } else {
            $message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
            $status = "false";
        }
    } else {
        $message = 'Merci de renseigner <strong>tous les champs</strong> et de recommencer.';
        $status = "false";
    }
} else {
    $message = 'Une <strong>erreur</strong> est survenue. merci de recommencer.';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>