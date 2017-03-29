<html>
  <body>
    <?php

      if (isset($_POST['action'])){
      	$_POST['action']="undefine";
      }

      $to = "info@mikesairportcars.co.uk";
      $from = $_REQUEST['contactform-email'] ;
      $name = $_REQUEST['contactform-fullname'] ;
      $headers = "From: $from";   
      $subject = "Website Booking Form" ;

      $fields = array();
        $fields{"contactform-fullname"} = "Full Name"; 
        $fields{"contactform-email"} = "Email Address";
        $fields{"contactform-contactnumber"} = "Contact Number";
        $fields{"contactnumber"} = "Contact Number";
        // Next Form-Group
        $fields{"contactform-howmanytraveling"} = "How Many Traveling";
        $fields{"contactform-childseats"} = "Child Seats Required"; 
        $fields{"contactform-destination"} = "Destination";
        // Next Form-Group
        $fields{"contactform-luggage"} = "Luggage Quantity and Type";
        // Next Form-Group 
        $fields{"contactform-dateofpickup"} = "Date of Pickup";
        $fields{"contactform-timeofpickup"} = "Time of Pickup"; 
        $fields{"contactform-flightnumber"} = "Flight Number";
        // Next Form-Group 
        $fields{"contactform-pickupaddress"} = "Pickup Addresses";
        // Next Form-Group 
        $fields{"contactform-returndate"} = "Return Date";
        $fields{"contactform-returntime"} = "Return Time";
        $fields{"contactform-returnflightnumber"} = "Return Flight Number";
        // Next Form-Group 
        $fields{"contactform-comments"} = "Comments and Requirements";

        $body = "We have received the following information:\n\n";
          foreach($fields as $a => $b){
            $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]);
          }

      $headers2 = "From: NoReply@MikesAirportCars.co.uk"; 
      $subject2 = "Thank you for your enquiry"; 
      $autoreply = "Thank you for your enquiry. Somebody will get back to you as soon as possible, usualy within 48 hours.";
       
      if($from == ''){
        print "You have not entered an email, please go back and try again";
      } else { 
          if($name == ''){
            print "You have not entered a name, please go back and try again";
        } else { 
            $send = mail($to, $subject, $body, $headers); 
            $send2 = mail($from, $subject2, $autoreply, $headers2);

            if($send){
              header( "Location: http://mikesairportcars.co.uk/thankyou.html" );
            } else {
              print "We encountered an error sending your mail, please notify info@MikesAirportCars.co.uk";
            }
          }
        }

    ?>
  </body>
</html>
