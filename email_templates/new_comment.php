<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        // $image = wp_get_upload_dir()["basedir"].'/2020/03/smile_logo.png';
        // $base64 = "";
        // if(is_file($image)){
        //     $type = pathinfo($image, PATHINFO_EXTENSION);
        //     $data = file_get_contents($image);
        //     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // }

        $idea_title = get_field("τίτλος_επιχειρηματικής_ιδεας", $render_object['idea_id']);
        ?>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        
        <div style="width: 80%; display: block;margin: auto;min-height: 300px;padding-top: 40px;">
            <img style="display:block; margin:0 auto; height:auto;" src="cid:site_logo" alt="" />

            <?php if(pll_current_language() == 'el'): ?>
                <h1 style="color:black!important;font-size:23px;text-align: center;margin-bottom: 50px;">
                    Ένα νέο σχόλιο έχει υποβληθεί στην ιδέα σας <br> <a href="<?php echo get_permalink($render_object['idea_id']);?>"><?php echo $idea_title; ?></a>
                </h1>
            <?php else: ?>
                <h1 style="color:black!important;font-size:23px;text-align: center;margin-bottom: 50px;">
                    A New Comment has been submited to your idea <br> <a href="<?php echo get_permalink($render_object['idea_id']);?>"><?php echo $idea_title; ?></a>
                </h1>
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
