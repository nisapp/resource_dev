<html>
    <head>

    </head>
    <body>
        <form id="pl_form" method="post" action="http://www.gogvo.com/subscribe.php"><!--<?php //echo base_url(); ?>api/testform-->
            <input type="hidden" name="CampaignCode" value="<?php echo $pl_data->campaign_code; ?>" /><!--2b533a401b27-->
            <input type="hidden" name="FormId" value="<?php echo $pl_data->form_id; ?>" /><!--2716777-->
            <input type="hidden" name="AffiliateName" value="<?php echo $pl_data->plev_affliate_name; ?>" /><!--elishahong2-->
            <table align="center">
                <tr>
                    <td>Email:</td><td><input id="pl_email" type="text" name="Email" /></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input  type="submit" value="Submit" /></td>
                </tr>
            </table>
            <img src="http://www.gogvo.com/show_form.php?id=2716777" />
        </form>
    </body>

</html>
