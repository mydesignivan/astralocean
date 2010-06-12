<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- start: left-column -->
<div id="left-column" class="content">

    <h1>Contact Form</h1>
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nam ornare. Vivamus dolor metus, condimentum ac, iaculis non.</p>            -->

    <!-- Necessary div for jQuery validation -->
    <div id="contact-form">
        <form method="post" action="mailer.php">
            <fieldset>
                <label>Your name..</label>
                <input title="required" type="text" name="contact-name" value="" />

                <label>Your E-mail..</label>
                <input title="required" type="text" name="contact-email" value="" />

                <label>Your message..</label>
                <textarea title="required" name="contact-message" cols="40" rows="5" ></textarea><br/>
                
                <button type="submit" name="submit" class="submit">Send it!</button>
            </fieldset>
        </form>
    </div>
</div>
<!-- end: left-column -->

<!-- start: right-column -->

<div class="rounded-box">
    <div class="inner content">
        <h6>E-mail: <a href="#">info@astralocean.net</a></h6>
    </div>
    <div class="box-end"></div><!-- corners -->
</div>

<!--<div class="rounded-box">
    <div class="inner content">
        <p>123 Main Road East<br />
        Cityname, ST 12345</p>
    </div>
    <div class="box-end"></div>
</div>-->

<!-- end: right-column -->
