<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="/js/moment.js"></script>
    <link rel="stylesheet" href="/css/styles.css">
</head>


<body>
    <div class="container-fluid">


        <div class="row" style="height:100vh">
            <!-- main row -->
            <div class="col-2 right-nav catco-pannel" >
                <!-- side nav col -->
                <nav class="navbar">

                    <div class="navbar-nav nav-link-side">
                        <a class="nav-item nav-link" href="/">DASHBOARD</a>
                        <a class="nav-item nav-link" href="/holdings">GOLD WALLET</a>
                        <a class="nav-item nav-link" href="/placeorder">PLACE BUY ORDER</a>
                        <a class="nav-item nav-link" href="/referrals">MY REFERRALS</a>
                        <a class="nav-item nav-link" href="/transactions">TRANSACTIONS</a>
                        <a class="nav-item nav-link" href="/wallettransfer">WALLET TRANSFER</a>
                        <a class="nav-item nav-link" href="/">BUSINESS PLAN</a>

                    </div>

                </nav>



            </div>
            <!-- side nav col -->



            <!-- right side col -->
            <div class="col-10 d-flex flex-column">

                <div class="row">
                    <div class="col ">

                        <div class="row catco-pannel">
                            <div class="col">
                                <nav class="navbar navbar-expand ">
                                        <ul class="nav navbar-nav mx-auto">
                                                <li class="nav-item ">
                                                        <a style="font-size:25px; font-weight:bold;" class="nav-link goldtextcss" href="">CATCOTRADE</a>  
                                                      </li>
                                            </ul>
                                   
                                    <ul class="nav navbar-nav">

                                        <li class="nav-item ">
                                          <a style="color:#FFF"class="nav-link" href="/logout">logout</a>  
                                        </li>
                                    </ul>

                                </nav>
                            </div>
                        </div>

                        <div class="row main-col">
                            
<!-- main content goes here -->
@yield('content')
                        </div>
                    </div>
                </div>



                <div class="row align-self-end">
                    <div class="col">
                    <p>catcotrade 2018</p>
                    
                    </div>
                    
                            </div>
                    

            </div>
            <!-- right side col -->




        </div>
        <!-- main row  -->



    </div>
    





















  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>

</html>