<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous"> 
    
    <!-- Bootstrap Icons -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="./style.css">
  
    <title>To-do List</title>

    <style>
        #dynline {
        display: inline-block;
        animation: dline 3s ease-in-out infinite;;
        }

      @keyframes dline {
      0% {
          width:0%;
          left:5%;
          border-top:5px solid rgb(0, 255, 123);
      }


      50% {
          width:90%;
          left:5%;
          border-top:5px solid rgb(0, 255, 204);

      }

      100% {
          left:95%;
          width:0%;
          border-top:5px solid rgb(0, 60, 255);
      }
      }
      /* Logo Image */
      .navbar-brand img {
        transition: transform 0.3s ease-in-out;
      }
      .navbar-brand img:hover {
        transform: scale(1.1);
      }

      /* Navbar Links */
      .nav-link {
        font-size: 1rem;
        font-weight: 500;
        transition: color 0.2s ease-in-out;
      }
      .nav-link:hover {
        color: #FFD700;
      }

      /* Buttons */
      .btn-outline-light {
        border: 2px solid #FFF;
        transition: background-color 0.3s, color 0.3s;
      }
      .btn-outline-light:hover {
        background-color: #FFF;
        color: #4CAF50;
      }
      .btn-light {
        transition: background-color 0.3s, color 0.3s;
      }
      .btn-light:hover {
        background-color: #FFD700;
        color: #FFF;
      }



      #navbar{
        border: #555555 3px solid;
        border-top: 0px;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
      }

      .logo{
        width: 50px;
        height: auto;
        background: transparent;
        display: block;
        border-radius: 10px;
      }
      .form-check-label {
        font-size: 1.2rem;
      }

      .form-check-input {
        width: 20px;
        height: 20px;
        margin-right: 10px;
      }

      .form-check-label {
        font-size: 1.2rem;
      }

      #Task {
        max-width: 600px;
        margin: 0 auto;
      }

      #taskInput {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        font-size: 18px;
        padding: 10px;
      }

      #Task button {
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
        font-size: 18px;
        padding: 10px 20px;
      }

      #taskprogress	{
        margin: 20px;
      }

      .taskcontainer {
        padding : 20px;
        border-radius: 15px;
        border: 2px solid rgb(143, 5, 143);
        display: flex;
        align-items: center; /* Vertically center content */
        justify-content: space-between; /* Spread items inside evenly */
        max-width: 500px; /* Adjust the maximum width */
        margin: 60px auto; /* Center the container */
        
      }

      #numbers{
        width: 100px;
        height: 100px;
        background-color: purple;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 20px;
        font-weight: bold;
        color: #ffffff;

      }
      #progressBar{
        width: 100%;
        height: 10px;
        background-color: rgb(140, 116, 170);
        border-radius: 5px;
        margin-top: 20px;
      }

      #progress {
        width: 50%;
        height: 100%;
        background-color: rgb(64, 255, 0);
        
      }

      #taskForm{
        margin-top: 60px;
      }
      #tasklist{
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
        width: 100%;
        list-style: none;
        
      }

      .taskItem{
        display: flex;
        align-items: center;
        background-color: rgb(143, 5, 143);
        padding: 10px;
        border-radius: 10px;
        justify-content: space-between;
        height: 40px;
        color: #ffffff;
      }

      .taskItem:hover{
        background-color: rgb(58, 48, 64);
      }

      .taskItem p{
        margin: 0;
      }
        
      .task{
        display: flex;
        align-items: center;
        gap: 10px;
        height: 40px;
        padding-left: 10px;
      }



      .taskCheckbox{
        width: 20px;
        height: 20px;
      }

      .completed {
        text-decoration: line-through;
        text-decoration-color: #ff00ae;
        text-decoration-thickness: 4px;
      }

      .taskItem i{
        width: 24px;
        height : 24px;
        margin: 0 10px;
        cursor: pointer;
      }


    </style>
</head>


<body>
    <div class="mainbody">
      <div class="container-md">
      <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid">
          <!-- Brand Section -->
          <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <img src="./images/Logo.png" alt="Logo" style="width: 40px; height: auto; border-radius: 50%;">
            <span class="fw-bold">To-do List</span>
          </a>
      
          <!-- Toggler for Mobile -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- Collapsible Content -->
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
              <!-- Dropdown Links -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Links
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://diegomelgara.com">Portfolio</a></li>
                  <li><a class="dropdown-item" href="diego.melgara-reyes@mohawkcollege.ca">Email</a></li>
                  <li><a class="dropdown-item" href="https://github.com/dmelgara">GitHub</a></li>
                </ul>
              </li>
              <!-- Login and Sign-Up Buttons -->
              <li class="nav-item">
                <a href="login.html" class="btn btn-outline-light me-2">Login</a>
              </li>
              <li class="nav-item">
                <a href="signup.html" class="btn btn-light">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
      
      
    
        
        <!-- Test -->
        <div class="container-md">
          <div class="container text-center">
            <h1>Welcome to your To-do List!</h1>
            <p>Keep track of your tasks and stay productive!</p>
          </div>
         




        <!-- Task Adder -->
        <div class="container-md">
          <div id="taskprogress" class="container text-center">
            <div class="taskcontainer">
              <div class="details">
                <h2>To-do Progress</h2>
                <div id="dynline"></div>
                <p>Keep it up!</p>
                <div id="progressBar">
                  <div id="progress"></div>
                </div>
              </div>
              <div class="stats">
                <p id="numbers"> 0 / 0</p>
              </div>
  
            </div>
          </div>
        </div>
        
        <!-- Task Form -->
        <form id="taskForm">
          <div id="Task" class="input-group mb-3">
            <input type="text" class="form-control" id="taskInput" placeholder="Enter your task here">
            <button id="BtnTask" type="submit" class="btn btn-primary">
              <i class="bi bi-patch-plus"></i>
            </button>
          </div>
        </form>
        
        <!-- Task Viewer -->
        <ul id="tasklist"></ul>
      </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
    <script src="./process.js"></script>
</body>
</html>
