<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="/js/moment.js"></script>
<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

    <link rel="stylesheet" href="/css/styles.css">
</head>


<body>
    <div class="container-fluid">
    

        <div class="row " style="height:100vh">
            <div class="col d-flex flex-column justify-content between">
    
        <div class="row  top-bar">
            <div class="col">
                <nav class="navbar navbar-expand ">

               

                                <a style="font-size:25px; font-weight:bold;" class="navbar-brand goldtextcss" href="">CATCOTRADE</a>                       
                        <ul class="nav navbar-nav mx-auto">
                                <li class="nav-item ">


                                </li>
                            </ul>
                   
                    <ul class="nav navbar-nav">

                        <!-- <li class="nav-item ">
                          <a style="color:#FFF"class="nav-link" href="/logout">logout</a>  
                        </li> -->

                          <!-- Dropdown -->
    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="/changepassword">Change password</a>
              <a class="dropdown-item" href="/viewprofile">Profile</a>
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
            </li>

                    </ul>

                </nav>
            </div>
        </div>

        <div class="row flex-fill">
            <!-- main row -->
            <div class="col-2 p-0 right-nav " >
               
                    <nav id="sidebar">
<ul class="list-unstyled components sidenav">
    <li>
        <a class="" href="/home"> <i class="fas fa-user-circle fa-lg"></i> Home</a>
        
    </li>
    <li>       <a class="" href="/holdings"> <i class="fas fa-wallet fa-lg"></i> Catco Wallet</a>
    </li>
    <li> <a class="" href="/placeorder"><i class="fas fa-shopping-cart fa-lg"></i>Place Buy Order</a></li>    
  <li> <a class="" href="/referrals"> <i class="fas fa-users fa-lg"></i>My Referrals</a></li>     
     <li><a class="" href="/transactions"><i class="fas fa-exchange-alt fa-lg"></i>Transactions</a></li>   
     <li> <a class="" href="/wallettransfer"> <i class="fas fa-credit-card
                fa-lg"></i>Wallet Transfer</a></li>  
     <li> <a class="" href="/withdraw"> <i class="fas fa-money-check-alt fa-lg"></i>Withdraw</a></li>          
        <li><a class="" href="/home"><i class="fas fa-clipboard fa-lg"></i>Business Plan</a></li>  

</ul>
                    </nav>




            </div>
            <!-- side nav col -->



            <!-- right side col -->
            <div class="col-10 d-flex  flex-column align-content-between">

               

                        

                        <div class="row main-col flex-fill" >
                            
<!-- main content goes here -->
@yield('content')
                       
                </div>



                <div class="row  d-flex justify-content-center">
                    <div class="col-6">
                    <a href="https://ssl.comodo.com">
                    <img src="https://ssl.comodo.com/images/trusted-site-seal.png" alt="Comodo Trusted Site Seal" width="113" height="59" style="border: 0px;"></a>                    
                <span style="display:inline-block mb-auto mt-auto">	Copyrights &copy;  Catco Trading International Inc - 2018 
</span>   
                </div>
                  
                    
                            </div>
                    

            </div>
            <!-- right side col -->




        </div>
        <!-- main row  -->

    </div> <!-- wrapper col -->
</div>  <!-- wrapper row -->
    </div>
    





















  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>

</html>