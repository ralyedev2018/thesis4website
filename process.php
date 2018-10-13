
<html>
<body>
<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('lib/fpdf/fpdf.php');
require_once('lib/fpdi/src/autoload.php');
include('lib/phpqrcode/qrlib.php'); 
require ('lib/phpmailer/src/PHPMailer.php');
require ('lib/phpmailer/src/Exception.php');
require ('lib/phpmailer/src/SMTP.php');

 ?>
<?php
	$firstname = $_GET["fname"];
	$lastname = $_GET["lname"];
	$minitial = $_GET["mname"];
	$email = $_GET["email"];
	$phonenumber= $_GET["pnumber"];
	$school = $_GET["school"];
?>


<?php  //-----------------------------------------------------------------------------------
	//Connect DB starts here

?>
<?php
$servername = "localhost";
$username = "id3236546_thesis4db";
$password = "thesis4db";
$dbname = "id3236546_thesis4database";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Ends Here
 //-----------------------------------------------------------------------------------
 
?>



<?php
$result = mysqli_query($conn, "SELECT * from registration");
$limit = mysqli_num_rows($result);

if ($limit < 100){

    $sql = "SELECT email FROM registration WHERE email = '".$email."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    
        //Kapag existing na ung email
       $message = "Sorry! Email is already used!";

		echo "<script type='text/javascript'>alert('$message');</script>";

    }  
    else {
        $sql = "INSERT INTO registration (firstname, lastname, middleinitial, email, phonenumber, school)
                VALUES ('$firstname', '$lastname', '$minitial', '$email', '$phonenumber', '$school' )";

                if (mysqli_query($conn, $sql)) {
                    //it calls the function that sends generates qr, fix waiver then send to email
                     _sendEmail();
                } 

        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }

} else{
    // Dito ung kapag napunu na ung slots
    $message = "SORRY THE REGISTRATION IS ALREADY CLOSED";

		echo "<script type='text/javascript'>alert('$message');</script>";
   
}



mysqli_close($conn);

?>

<?php


function _sendEmail(){

global $firstname, $lastname, $email;
//include('config.php'); 
$pathqr = 'qrcodespng/';
$pathpdf = 'pdfs/';
$name = $firstname.$lastname;
 QRcode::png($firstname.' '.$lastname, $pathqr.$name.'.png', QR_ECLEVEL_L, 3); 

$pdf = new Fpdi();

$pageCount = $pdf->setSourceFile('Waiver.pdf');
$pageId = $pdf->importPage(1);

$pdf->addPage();
$pdf->useImportedPage($pageId, 0, 0, 210);

$pdf->Image($pathqr.$name.'.png', 130, 220, 50, '', '', '', '', false, 10);

$pdf->Output($pathpdf.$name.'.pdf', 'F');




$mail = new PHPMailer(true);                             
try {
    //Server settings
    $mail->SMTPDebug = 2;                                         // Enable verbose debug output
    $mail->isSMTP();                                     
    $mail->Host = 'smtp.gmail.com;smtp.yahoo.com;smtp.hotmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                         // Enable SMTP authentication
    $mail->Username = 'csexpo2017@gmail.com';                       // SMTP username
    $mail->Password = 'csexpo2k17';                                 // SMTP password
    $mail->SMTPSecure = 'tls';                                      //Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                              // TCP port to connect to


    //Recipients
    $mail->setFrom('csexpo2017@gmail.com', 'CSITEXPO2017');
	$mail->addAddress($email, $name);     // Add a recipient

    //Attachments
    $mail->addAttachment($pathpdf.$name.'.pdf', 'Waiver.pdf');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'CSITEXPO Confirmation';
    $mail->Body    = 'Please visit this the facebook page https://www.facebook.com/CSITExpo2k17/ for announcements. Download and print the waiver attached in this email, this will serve as your gatepass in the said event.';

    $mail->send();
    //this is whhere to put the 'yehey you are already registered! please check email asap'
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

}

?>

</body>
</html>