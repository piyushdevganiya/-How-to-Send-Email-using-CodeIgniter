<!DOCTYPE html>
<html>
    <head>
        <title>CodeIgniter Send Email</title>
    </head>
    <body>
        <div>
            <h3>Use the form below to send email</h3>
            <form method="post" action="<?php echo base_url('EmailController/sendEmail')?>" enctype="multipart/form-data">
                <input type="email" id="to" name="to" >
                <br><br>
                <input type="text" id="subject" name="subject" >
                <br><br>
                <textarea rows="6" id="message" name="message" placeholder="Type your message here"></textarea>
                <br><br>
                <input type="submit" value="Send Email" />
            </form>
        </div>
    </body>
</html>