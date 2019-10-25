<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>OpenTok CodeIgniter 2 Sample</title>

</head>
<body>
    <h2>Session ID</h2>
    <p><?php echo $sessionId ?></p>
    <h2>Token</h2>
    <p><?php echo $token ?></p>
    <script src="https://static.opentok.com/v2/js/opentok.js" charset="utf-8"></script>
    <script charset="utf-8">
    	var apiKey = <?php echo $this->config->item('opentok_key') ?>;
    	var sessionId = "<?php echo $sessionId ?>";
    	var token = "<?php echo $token ?>";
    	console.log(apiKey);
        var session = OT.initSession(apiKey, sessionId)
        .on('streamCreated', function(event) {
          session.subscribe(event.stream ,"subscribers", { insertMode : "append" , 
            width : "100%", 
            height: "100%"});
        })
        .connect(token, function(error) {
          var publisher = OT.initPublisher("publisher", {
            insertMode : "append", 
            width : "100%", 
            height : "100%"
          });
          session.publish(publisher);
        });
    </script>
</body>
</html>
