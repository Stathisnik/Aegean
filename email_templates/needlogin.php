<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        
        <div style="width: 80%; display: block;margin: auto;min-height: 300px;padding-top: 40px;">
            <img style="display:block; margin:0 auto; height:auto;" src="cid:site_logo" alt="" />

            <?php if(pll_current_language() == 'el'): ?>
                <h1 style="color:black!important;font-size:23px;text-align: center;margin-bottom: 50px;">
                    Η ομάδα σας καταχώρησε νέα Επιχειρηματική Ιδέα.
                </h1>
                <p> Αγαπητέ/ή κύριε/α,</p>
                <p> Ένα μέλος της κοινότητας Aegean Startups έχει υποβάλει Επιχειρηματική Ιδέα και σας έχει δηλώσει σαν μέλος σε αυτή την Ιδέα.</p>
                <p> Η Ιδέα είναι υπό έγκριση. Όταν εγκριθεί, θα μπορείτε να την δείτε <a href="<?php echo get_home_url(); ?>/idees/"> εδώ </a> . </p>

                <p> Για να μπορέσει να προχωρήσει η Ιδέα στο επόμενο στάδιο, πρέπει να κάνετε εγγραφή στην πλατφόρμα. <p> 
                <p>Για να γίνει η ταυτοποίηση, παρακαλούμε να κάνετε την εγγραφή ή την σύνδεσή σας με αυτό το email. </p>

                <div style="display:flex;">
                    <p> <a style="color: white;background: #3397ff;box-shadow: 2px 2px 4px #00000033;border-radius: 21px;min-width: 180px;margin: 3rem auto 4rem;border: 0px;cursor: pointer;padding: 9px 20px;text-align: center;" href="<?php echo get_home_url(); ?>/engrafi-2/"> Εγγραφή </a>  &nbsp; &nbsp; <a style="color: white;background: #3397ff;box-shadow: 2px 2px 4px #00000033;border-radius: 21px;min-width: 180px;margin: 3rem auto 4rem;border: 0px;cursor: pointer;padding: 9px 20px;text-align: center;"class="btn primary_btn com" href="<?php echo get_home_url(); ?>/syndesi/"> Σύνδεση </a> </p> 
                </div>
                <p style="text-align:right;"> Η ομάδα των Aegean Startups.</p>
            <?php else: ?>
                <h1 style="color:black!important;font-size:23px;text-align: center;margin-bottom: 50px;">
                    Your Team has submitted a new Business Idea
                </h1>
                <p> Dear User,</p>
                <p>A member of the community of Aegean Startups has submitted a Business Idea and has registered you as a team member in it.
                The Idea is waiting to be approved. When it is approved, you will be able to see it <a href="<?php echo get_home_url(); ?>/idees/"> here </a> . </p>

                </p> In order for the Idea to progress to the next phase , you will have to register to the platform. In order for the identification to take place, please register or login to the platform with this email. </p>

                <div style="display:flex;">
                    <p> <a style="color: white;background: #3397ff;box-shadow: 2px 2px 4px #00000033;border-radius: 21px;min-width: 180px;margin: 3rem auto 4rem;border: 0px;cursor: pointer;padding: 9px 20px;text-align: center;" href="<?php echo get_home_url(); ?>/engrafi-2/"> Register  </a>  &nbsp; &nbsp; <a style="color: white;background: #3397ff;box-shadow: 2px 2px 4px #00000033;border-radius: 21px;min-width: 180px;margin: 3rem auto 4rem;border: 0px;cursor: pointer;padding: 9px 20px;text-align: center;"class="btn primary_btn com" href="<?php echo get_home_url(); ?>/syndesi/"> Login </a> </p> 
                </div>
                <p> The team of Aegean Startups.</p>
            <?php endif; ?>

            <?php if(pll_current_language() == 'el'): ?>
                <p style="color:black!important;font-size:15px;text-align: center;">
                   <i> Μην απαντήσετε σε αυτό το email. </i>
                </p>
            <?php else: ?>
                <p style="color:black!important;font-size:15px;text-align: center;">
                    <i> Do not reply to this email. </i>
                </p>
            <?php endif; ?>

        </div>
    </body>
</html>