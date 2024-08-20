<html>
    <head>
        <title>Laravel 8 Mobile Number (OTP) Authentication using Firebase - websolutionstuff.com</title>    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
<body>  
<div class="container">
    <div class="card" style="margin-top: 10px">
      <div class="card-header">
        Enter Verification code
      </div>
      <div class="card-body">
        <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
        <form>
            <input type="text" id="verificationCode" class="form-control" placeholder="Enter Verification Code"><br>
            <button type="button" class="btn btn-success" onclick="VerifyCode();">Verify Code</button>
        </form>
      </div>
    </div>
  
</div>

<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
<script>
      
    const firebaseConfig = {
        apiKey: "AIzaSyC2AiqOJ3CcKRcfappz54GNxlZNnmQLL5U",
        authDomain: "penta-b0191.firebaseapp.com",
        projectId: "penta-b0191",
        storageBucket: "penta-b0191.appspot.com",
        messagingSenderId: "1003768044641",
        appId: "1:1003768044641:web:9f058dbb53a3a13dadde20",
        measurementId: "G-ZT88HEGVXH"
    };

  firebase.initializeApp(firebaseConfig);
</script>
    
<script type="text/javascript">
  
  
    function VerifyCode() {
  
        let code = $("#verificationCode").val();
        
        let verificationId = sessionStorage.getItem('verificationId');
        
        let credential = firebase.auth.PhoneAuthProvider.credential(verificationId, code);
 
        firebase.auth().signInWithCredential(credential).then(function (result) {
            let user=result.user;            
            $("#successRegsiter").text("You Are Register Successfully.");
            $("#successRegsiter").show();
            setTimeout(() => {
                $("#successRegsiter").hide();
            }, 2000);
  
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
            setTimeout(() => {     
                $("#error").hide();
            }, 2000);
        });
    }
  
</script>
  
</body>
</html>
