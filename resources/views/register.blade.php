


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<title>Registration</title>


</head>
<body>
    @if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

<form action="" method="post" id="">
    @csrf
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1>Register Form</h1>
            <hr>

            <label for="name"><b>name</b></label>
            <input type="text" placeholder="Enter name" name="name" id="name">

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email">
            
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password">

            <label for="mobile"><b>mobile</b></label>
            <input type="number" placeholder="Enter mobile"  class="form-control" name="mobile" id="mobile">
            
            <button type="submit" class="registerbtn">Register</button>
        </div>
        
        <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
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
