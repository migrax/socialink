<?php
$app_id = elgg_get_plugin_setting("facebook_app_id", "socialink");
?>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '<?php echo $app_id; ?>', // App ID                                                                                                                         
            status: true, // check login status                                                                                                                          
            cookie: true
        });

        // Check if the current user is logged in                                                                                                                           
        // and has authorized the app                                                                                                                                       
        FB.getLoginStatus(function(response) {
            // Check the result of the user                                                                                                                                               
            if (response && response.status == 'connected') {
                // The user is connected to Facebook                                                                                                                            
                // and has authorized the app.                                                                                                                                  
                // Now personalize the user experience                                                                                                                          
                
                elgg.forward('/socialink/forward/facebook/login');
            }
        });
    };

    // Load the SDK Asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $app_id; ?>";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
