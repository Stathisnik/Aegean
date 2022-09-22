<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        
        <div style="width: 80%; display: block;margin: auto;min-height: 300px;padding-top:40px">
            <img style="display:block; margin:0 auto; height:auto;" src="cid:site_logo" alt="" />

            <?php if(pll_current_language() == 'el'): ?>
                <h1 style="color:black!important;font-size:23px;text-align: center;margin-bottom: 50px;">
                    Το σχόλιό σας έχει υποβληθεί
                </h1>
            <?php else: ?>
                <h1 style="color:black!important;font-size:23px;text-align: center;margin-bottom: 50px;">
                    <?php echo $render_object["text"];?>
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
