<?php 
require_once '../lib/phpmailer/class.phpmailer.php';

/**
* 
*/
class SendMail extends PHPMailer
{

	private $htmlMail, $mailRecep, $mailSubject, $mailFrom, $viewMailData;
	
	function __construct($htmlMail='',$mailRecep='',$mailSubject='',$mailFrom='',$viewMailData='')
	{
		$htmlMail = $this->htmlMail;
		$mailRecep = $this->mailRecep;
		$mailSubject = $this->mailSubject;
		$mailFrom = $this->mailFrom;
        $viewMailData = $this->viewMailData;
	}

	// METODOS SET AND GET
    //Correo al que le llegaran los mail
	public function setMailRecep($mailRecep){
		$this->mailRecep = $mailRecep;
	}
	public function getMailRecep(){
		return $this->mailRecep;
	}

    //Asunto del correo
	public function setMailSubject($mailSubject){
		$this->mailSubject = $mailSubject;
	}
	public function getMailSubject(){
		return $this->mailSubject;
	}
    
    //Correo que aparecerá como el que envió
	public function setMailFrom($mailFrom){
		$this->mailFrom = $mailFrom;
	}
	public function getMailFrom(){
		return $this->mailFrom;
	}


	// METODOS
	public function sendMail($arrMail,$file){
		$dataMail = $this->getMailRecep();
        
        $AddAddressCount = count($dataMail['AddAddress']);
        $AddCCCount = count($dataMail['AddCC']);
        $AddBCCCount = count($dataMail['AddBCC']);

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth=true;
		$mail->SMTPSecure=MAIL_SECURE;
		$mail->SMTPDebug=1;
		$mail->Host=MAIL_HOST;
		$mail->Port=MAIL_PORT;
		$mail->Username=MAIL_USER;
		$mail->Password=MAIL_USER_PASS;
	    $mail->From=MAIL_USER;
		$mail->FromName=$this->getMailFrom();
		$mail->Subject=$this->getMailSubject();
		$mail->AltBody=MAIL_ALTBODY;
		$mail->AddAttachment($file['file_tmp_name'],$file['file_name']);
		$mail->CharSet="UTF-8";
		$mail->MsgHTML($this->html_view_mail($arrMail));


        if($AddAddressCount > 0){
            for($i=0;$i<$AddAddressCount;$i++){
                $mail->AddAddress($dataMail['AddAddress'][$i],$dataMail['AddAddress'][$i]);               
            }
        }
        if($AddCCCount > 0){
            for($f=0;$f<$AddCCCount;$f++){
                $mail->AddCC($dataMail['AddCC'][$f],$dataMail['AddCC'][$f]);               
            }     
        }
        if($AddBCCCount > 0){
            for($g=0;$g<$AddBCCCount;$g++){
                $mail->AddBCC($dataMail['AddBCC'][$g],$dataMail['AddBCC'][$g]);               
            }   
        }

		$mail->IsHTML(true);
		$mailSended = $mail->Send();

		return $mailSended;
	}
    
 
    public function html_view_mail($arrMail){
          
        for($f=0;$f<count($arrMail['head-table']);$f++){
            $headTable .= '<th style="border: 1px solid black;border-collapse: collapse;padding:15px;">'.htmlspecialchars($arrMail['head-table'][$f]).'</th>'; 
        }
        
        for($i=0;$i<count($arrMail['body-table']);$i++){
              $this->viewMailData .= '<td style="border: 1px solid black;border-collapse: collapse;padding:15px;">'.htmlspecialchars($arrMail['body-table'][$i]).'</td>';
        }
        
        $this->htmlMail = file_get_contents('../modules/mailing_html.php');
        $this->htmlMail = str_replace("{MAIL-BACKGROUND-HEAD}",$arrMail['bg'],$this->htmlMail);
        $this->htmlMail = str_replace("{MAIL-TITLE}",$arrMail['title'],$this->htmlMail);
        $this->htmlMail = str_replace("{MAIL-TABLE-HEAD}",$headTable,$this->htmlMail);
        $this->htmlMail = str_replace("{MAIL-TABLE-BODY}",$this->viewMailData,$this->htmlMail);
        
        return $this->htmlMail;
    }
    
    
}

 ?>