<?php
  require 'connect.inc.php';
?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>elxr | Contact</title>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,900,400italic,900italic' rel='stylesheet' type='text/css'>
    <script src="//use.typekit.net/kgx3fhv.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <link rel="stylesheet" href="stylesheets/app.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>

    <script src="bower_components/modernizr/modernizr.js"></script>
    
    <!--Hide form upon successful submission-->
    <script>
 //      ).submit(function( event ) {
   //       alert( "Handler for .submit() called." );
     //    event.preventDefault();
    //  });
  </script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  </head>
  <body class="portfolio">
    <?php       
          if(isset($_POST['email'])){ 
          //check if form is submitted
              $email = $_POST['email'];
              $firstname = $_POST['firstname'];
              $lastname = $_POST['lastname'];
              $company = $_POST['company'];
              $phone = $_POST['phone'];
              $serviceNeed = $_POST['serviceNeed'];
              $description = $_POST['description'];
          
          
            if(!empty($_POST['email'])&&!empty($_POST['firstname'])&&!empty($_POST['lastname'])&&!empty($_POST['company'])){ 
            // check that all required fields are completed
            
              if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
              // check that it's a valid email address 
              // if valid, then sanitize that email
                $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
                
                $query = "SELECT `email` FROM `signups` WHERE `email`='$sanitized_email'";
                $query_run = mysqli_query($link, $query);
                $query_num_rows = mysqli_num_rows($query_run);
      
                if($query_num_rows >=1){
                    $alreadysignedup = 'Got it already.';
                  
                  } else{      

                    $query = "INSERT INTO `signups`(`id`, `firstname`, `lastname`, `email`, `phone`, `company`, `serviceNeed`, `description`, `signupdate`) 
                          VALUES ('','".mysqli_real_escape_string($link, $firstname).
                          "','".mysqli_real_escape_string($link, $lastname).
                          "','".mysqli_real_escape_string($link, $sanitized_email).
                          "','".mysqli_real_escape_string($link, $phone).
                          "','".mysqli_real_escape_string($link, $company).
                          "','".mysqli_real_escape_string($link, serialize($serviceNeed)).
                          "','".mysqli_real_escape_string($link, $description).
                          "', CURRENT_TIMESTAMP)";
                      
                      $query_run = mysqli_query($link, $query);
                      
                      if($query_run){
                        $successMsg = 'Thank you for requesting a quote. We look forward to contacting you shortly.';
                        
                        /*
                        //Send email to ninjas@elxr.it with submission details
                        */

                        //remove leading 0 used in checkbox's hidden input field
                        $placeholder = array_shift($serviceNeed);

                        //convert array of checkbox selections to a string
                        $serviceNeed_comma_separated = implode(", ", $serviceNeed);
                        
                        // the message
                        $msg = "Yippee!! elxr just got a quote request. See the details below.
                                \nName: ".$firstname." ".$lastname." 
                                \nEmail: ".$sanitized_email." 
                                \nCompany: ".$company."
                                \nPhone: ".$phone."
                                \nWhich services are you interested in? ".$serviceNeed_comma_separated." 
                                \nDescribe your project: ".$description ;

                        // use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg,70);

                        // send email
                        mail("ninjas@elxr.it, rfombrun@gmail.com","New Quote Request from Website",$msg);
                        

                      } else {
                        $cantJoinNowErr = 'Sorry we couldn\'t submit your request at this time. 
                                            Please email us at ninjas@elxr.it or try again later.';
                        //echo '<p class="subtitle"> Sorry we couldn\'t sign you up for our mailing list at this time. Please try again later.</p>';
                      
                      } // endif query_run 

                  } // endif check if already signed up

              } else{
                $validEmailErr = 'Please enter a valid email address.';
              
              } // endif filter_var(email...
              
            } else{

              $nameErr = 'All fields marked with an asterisk (*) are required.';
          
            } //endif !empty($_POST)
          
          } //endif isset($_POST)

    ?>

    <header>
    </header>
    <div class="row">
      <div class="container large-12 columns">
        <div class="large-12 columns">
          <a href="#" data-reveal-id="myModal">
            <img class="full-menu" src="stylesheets/img/menu.png">
          </a>
          <div id="myModal" class="reveal-modal" data-reveal>
            <ul class="popup-nav">
              <li>
                <a href="index.php">Home</a>
              </li>
              <li>
                <a href="details.php">Our Agency</a>
              </li>
              <li>
                <a href="portfolio.php">Portfolio</a>
              </li>
              <li>
                <a href="contact.php">Contact Us</a>
              </li>
            </ul>
            <a class="close-reveal-modal">x</a>
          </div>
        </div>

        <!--Begin About Us-->
        <div class="row">
          <div class="large-12 columns">
            <div class="details">
              <h5 id="AboutUs">
                <p>Request Quote</p>
              </h5>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="small-10 small-centered columns">
            <form action="contact.php" method="POST">
              <div class="large-12 columns"> <!--Error messages-->
                <p style="font-family: Playfair Display, serif; color: #3E0DFF">
                  <?php if(isset($nameErr)){echo $nameErr; }  ?>
                </p>
                <p style="font-family: Playfair Display, serif; color: #3E0DFF">
                  <?php if(isset($validEmailErr)){echo $validEmailErr;}?>
                </p> 
                <p style="font-family: Playfair Display, serif; color: #3E0DFF">
                  <?php if(isset($successMsg)){echo $successMsg;}?>
                </p>              
                <p style="font-family: Playfair Display, serif; color: #3E0DFF">
                  <?php if(isset($cantJoinNowErr)){echo $cantJoinNowErr;}?>
                </p>     

              </div><!--Error messages-->
              <div class="large-6 columns">
                <input type="text" placeholder="*First Name" name="firstname" maxlength="40" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} ?>"/>
              </div>
              <div class="large-6 columns">
                <input type="text" placeholder="*Last Name" name="lastname" maxlength="40" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>"/>
              </div>
              <div class="large-6 columns">
                <input type="text" placeholder="*Email Address" name="email" maxlength="40" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"/>
              </div>
              <div class="large-6 columns">
                <input type="text" placeholder="Phone Number" name="phone" maxlength="20" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>"/>
              </div>
              <div class="large-12 columns">
                <input type="text" placeholder="*Company" name="company" maxlength="60" value="<?php if(isset($_POST['company'])){echo $_POST['company'];}?>"/>
              </div>
              <div class="large-12 columns">
                <label>Which services are you interested in?</label>
                <div class="small-12 large-6 columns">
                  <input type="hidden" name="serviceNeed[]" value="0"  />
                  <input id="ResponsiveDesign" type="checkbox" name="serviceNeed[]" value="ResponsiveDesign" /><label for="ResponsiveDesign">Responsive Design</label>
                </div>
                <div class="small-12 large-6 columns">
                  <input id="LogoDesign" type="checkbox" name="serviceNeed[]" value="LogoDesign"/>
                  <label for="LogoDesign">Logo&nbsp;&amp;&nbsp;Identity Design</label>
                </div>
                <div class="small-12 large-6 columns">
                  <input id="SocialMedia" type="checkbox" name="serviceNeed[]" value="SocialMedia"/>
                  <label for="SocialMedia">Social Media Management</label>
                </div>
                <div class="small-12 large-6 columns">
                  <input id="EmailMarketing" type="checkbox" name="serviceNeed[]" value="EmailMarketing"/>
                  <label for="EmailMarketing">Email Marketing</label>
                </div>
              </div>
            <div class="large-12 columns">
              <textarea placeholder="Describe your project" name="description"></textarea>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="small-6 small-centered columns">
            <input id="damnsubmit" type="submit" class="button submit" value="SUBMIT">
          <!--  <a href="#" class="button submit">SUBMIT</a>--> 

          </div> 
        </div> 
      </form>
        

      <div class="row">
        <div class="small-12 small-centered large-12 large-centered columns">
          <div class="myNewClass"><p style="font-family: Playfair Display, serif; color: #3E0DFF"></p>
          </div> 
        </div> 
      </div> 
      
      <?php if(isset($successMsg)|| isset($alreadysignedup)){ ?>
        <!--run javascript if form's submitted successfully -->
        <script type="text/javascript">

          $('form').hide(); 
          $('#damnsubmit').hide();
          $('.myNewClass p').text( "Thank you for requesting a quote. We look forward to contacting you shortly!" ).show(); 
           
        </script> 
      <?php }?>

      <div class="row">
        <div class="small-10 small-centered columns">
          <p class="more-contact">
            For other inquiries, please contact us at <a href="mailto:ninjas@elxr.it?Subject=Request%20Quote" target="_top"><b>ninjas@elxr.it</b></a></p>
        </div>
      </div>


    </div>
  </div>



      </div> 
     </div>      
      <footer>  
        <div class="row">
          <div class="small-12 columns">
            <div class="small-2 small-centered medium-1 large-1 columns">
            </div>
            <div class="small-12 columns small-centered">
         <!-- <div class="divider">
          </div>-->
          </div>
          <div class="small-6 columns">
 
          <div class="copyright">
          <p>&copy;2014 elxr. All Rights Reserved.</p>
        </div>
      </div>
      <div class="small-6 columns">
        <ul>
          <li><a href="contact.php">contact</a>
          </li>
          <li><a href="http://www.facebook.com/elxrit">facebook.com/elxrit</a>
          </li>
          <li><a href="http://www.twitter.com/elxrit">@elxrit</a>
          </li>
        </ul>
      </div>
      </div>
    </div>

  </footer>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
