
<?php
   include('sms.class.php');
   $DTT_SMS = new Malath_SMS("sultansz","555555",'UTF-8');
    if (isset($_POST['Mobile'])){
                 $DTT_SMS = new Malath_SMS("sultansz","555555",'UTF-8');
                 $Credits = $DTT_SMS->GetCredits();
                 $SenderName = $DTT_SMS->GetSenders();
       	//	$SmS_Msg = @$_POST['Text'];
       		$msg = $this->input->post('Text');;
      //  	echo $msg;
       // 	die();
       		$SmS_Msg = $msg;
                $Mobiles = $this->input->post('Mobile');
                //$Originator ='SFHMCareers';
                $Originator ='sultanz';
               if(@$Mobiles){
                $Sends = $DTT_SMS->Send_SMS($Mobiles,$Originator,$SmS_Msg);
                if($Sends){
	                $this->session->set_flashdata('success', 'تم الارسال بنجاح');
	                	redirect('worker/sms');
	                }else {
	                   // code...
	                    $this->session->set_flashdata('danger', ' خطأ في الإرسال');
	                	redirect('worker/sms');
	                }
             }
    }
             
             ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      <script type="text/javascript">
       //  <!--
         function popup(url)
         {
          var width  = 600;
          var height = 350;
          var left   = (screen.width  - width)/2;
          var top    = (screen.height - height)/2;
          var params = 'width='+width+', height='+height;
          params += ', top='+top+', left='+left;
          params += ', directories=no';
          params += ', location=no';
          params += ', menubar=no';
          params += ', resizable=no';
          params += ', scrollbars=no';
          params += ', status=no';
          params += ', toolbar=no';
          newwin=window.open(url,'windowname5', params);
          if (window.focus) {newwin.focus()}
          return false;
         }
         // -->
      </script>
   </head>
   <body>
      <fieldset style="width:50%;margin:auto" dir=ltr>
         <!--<form action="" method="POST">-->
         <?php echo form_open('worker/sms'); ?>
            <table border="0" cellspacing="3" cellpadding="3">
               <tr>
                  <td>Check UserName And Password</td>
                  <td><input type="submit" name="check" value="check" /></td>
               </tr>
               <tr>
                  <td>Your Balance</td>
                  <td><input type="text" name="Balance" size="20" disabled="disabled" value="<?php
                     echo @$Credits;
                     ?>"></td>
               </tr>
               <tr>
                  <td>Sender Name</td>
                  <td>
                     <select size=1 name=Originator>
                        <option selected value="1">Select sender name</option>
                        <option selected value="sultanz">sultanz</option>
                        <?php
                           for ($i = 0; $i < count($SenderName); $i++) {
                               echo '<option value="' . $SenderName[$i] . '">' . $SenderName[$i] . '</option>';
                           }
                           ?>
                     </select>
                     <a href="javascript: void(0)" onclick="popup('addsender.php')"> Add Sender Name</a>
                  </td>
               </tr>
               <tr>
                  <td>Mobile No.</td>
                  <td><textarea name="Mobile" cols="30" rows="5"></textarea><br><font size="2" color="#FF0000"> Ex. 96655xxxxxxx,96655xxxxxxx</font></td>
               </tr>
               <tr>
                  <td>Message</td>
                  <td><textarea name="Text" cols="30" rows="5"></textarea></td>
               </tr>
               <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Go" value="Send SMS" /></td>
               </tr>
         </table>
         </form>
		 	  <p>© Copyright <a href="http://sms.malath.net.sa" text="Malath SMS">Malath SMS</a></p>
      </fieldset>
   </body>
</html>