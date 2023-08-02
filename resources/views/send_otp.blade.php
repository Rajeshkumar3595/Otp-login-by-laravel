


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<title>OTP send</title>

</head>
<body class="bg-secondary">
    
    @if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

<form method="post" class="mt-5">
    @csrf
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <label for="mobile"><b>mobile</b></label>

            @error('mobile')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="number" placeholder="Enter mobile" name="mobile" class="form-control" id="mobile" >
            <button type="submit" class="registerbtn">Send otp</button>
        </div>
    </div>
  </div>
</form>



<style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: black;
    }
    
    * {
      box-sizing: border-box;
    }
    
    /* Add padding to containers */
    .container {
      padding: 16px;
      background-color: white;
    }
    
    /* Full-width input fields */
    input[type=text], input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }
    
    input[type=text]:focus, input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }
    
    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }
    
    /* Set a style for the submit button */
    .registerbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }
    
    .registerbtn:hover {
      opacity: 1;
    }
    
    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }
    
    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }
    </style>
</body>
</html>
