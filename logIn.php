<!DOCTYPE html>
<html lang="en">

<head>
    <?php
     include('assets/codeSnippets/header.php'); 
     
    ?>
    <title>Join Us!</title>

</head>



<body>

    <script>



        $(document).ready(function() {
            $('#registerSection').hide();
            


        });

     



    function hideLogin(){
        $('#loginSection').hide();
        $('#registerSection').fadeTo(100, 1);
        $("#emailLogin").val( "" );
        $("#passwordLogin").val( "" );

    }

    function showLogin(){
        $('#loginSection').fadeTo(100, 1);
        $('#registerSection').hide();
        $("#phpUsernameRegister").val("");
        $("#phpEmailRegister").val( "" );
        $("#password").val( "" );
        $("#phpFirstNameRegister").val( "" );
        $("#phpLastNameRegister").val( "" );
        $("#verifyPassword").val( "" );
    }


    function emailDuplicateValidation(phpEmailRegister)
    {
        var parametros = {
                "phpEmailRegister" : phpEmailRegister
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'registerCountValClass.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () 
                {
                        //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) 
                { 

                    if(response == '0')
                    {
                        registerFunctionVal(
                        $('#phpUsernameRegister').val(),			
                        $('#phpEmailRegister').val(), 
                        $('#password').val(), 
                        $('#verifyPassword').val(), 
                        $('#phpFirstNameRegister').val(), 
                        $('#phpLastNameRegister').val()
                        );
                    }
                    else
                    {
                        Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'That email is already in use'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;
                    }

                   
                }
        });
    }


    function registerFunctionVal(phpUsernameRegister, phpEmailRegister, phpPasswordRegister, phpPasswordRegisterSecond, phpFirstNameRegister, phpLastNameRegister)
    {


    
       if (phpUsernameRegister == "")
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to complete the username'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;

        }
        if (phpEmailRegister == "")
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to complete the email'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;

        }
        if (phpPasswordRegister == "")
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to complete the password'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;

        }
        if (phpPasswordRegisterSecond == "")
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to complete the second password'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;

        }
        if (phpFirstNameRegister == "")
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to complete the First Name'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;

        }
        if (phpLastNameRegister == "")
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to complete the Last Name'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;

        }

        if (/^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$/.test(phpUsernameRegister))
        {

        }
        else
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to provide a valid Username'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;

                    }
                    else
                    {
                        return;

                    }
                    })
                    return;
                    

        }
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(phpEmailRegister))
        {

        }
        else
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to provide a valid Email address'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;

                    }
                    else
                    {
                        return;

                    }
                    })
                    return;
                    

        }
        if (/^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$/.test(phpFirstNameRegister))
        {

        }
        else
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to provide a valid First name'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;
                    

        }
        if (/^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$/.test(phpLastNameRegister))
        {

        }
        else
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to provide a valid Last name'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;
                    

        }
        if (phpPasswordRegister != phpPasswordRegisterSecond)
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'The passwords must be the same'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        return;
                    }
                    else
                    {
                        return;
                    }
                    })
                    return;

        }
        else
        {
        }

        var phpGender;
        var phpAccountType;
        var phpProfileType;
        
 



        registerAjax(phpUsernameRegister, phpEmailRegister, phpPasswordRegister, phpFirstNameRegister, phpLastNameRegister, phpGender, phpAccountType, phpProfileType);
                    


    }
 

    function registerAjax(phpUsernameRegister, phpEmailRegister, phpPasswordRegister, phpFirstNameRegister, phpLastNameRegister, phpGender, phpAccountType, phpProfileType)
    //, phpEmailRegister, phpPasswordRegister, phpFirstNameRegister, phpLastNameRegister)
    {

        var phpImage = $('#phpImage').val();
        parametros = new FormData(document.getElementById('registerForm'));

        //window.alert(phpUsernameRegister + " " + phpEmailRegister + " " + phpPasswordRegister + " " + phpFirstNameRegister + " "+ phpLastNameRegister + " " +phpGender + " " + phpAccountType + " " + phpProfileType + " " + phpImage);

            /*for (const value of parametros.values()) {
            console.log(value);
            }
*/

     for (const pair of parametros.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
        }


/*
        var parametros = {
                "phpUserName" : phpUsernameRegister,
                "phpEmail" : phpEmailRegister,
                "phpPassword" : phpPasswordRegister,
                "phpFirstName" : phpFirstNameRegister,
                "phpLastName" : phpLastNameRegister,
                "phpGender" : phpGender,
                "phpAccountType" : phpAccountType,
                "phpProfileType" : phpProfileType,
                "phpImage" : phpImage
        };
*/


        if ($('#phpGender1').is(":checked"))
        {
            parametros.append('phpGender', 'MALE');
        }
        if ($('#phpGender2').is(":checked"))
        {
            parametros.append('phpGender', 'FEMALE');
        }
        if ($('#phpAccountType1').is(":checked"))
        {
            parametros.append('phpAccountType', 1);
        }
        if ($('#phpAccountType2').is(":checked"))
        {
            parametros.append('phpAccountType', 2);
        }
        if ($('#phpProfileType1').is(":checked"))
        {
            parametros.append('phpProfileType', 0);
        }
        if ($('#phpProfileType2').is(":checked"))
        {
            parametros.append('phpProfileType', 1);
        }

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/register.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                contentType: false,
                processData: false,
                beforeSend: function () 
                {
                        //$("#registerFormresultado").html("Procesando, espere por favor...");
                },
                success:  function (response) 
                { 
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your registration has been completed',
                    showConfirmButton: false,
                    timer: 1500
                    })


                    window.alert(response);

                    setTimeout(function() {
                    
                        window.location.href = "index.php";

                    }, 2500);

 
                }
                
        });

    }
    

    function loginFunction(phpEmailLogin, phpPasswordLogin)
    {
        //window.alert(phpEmailLogin + " " + phpPasswordLogin);
        
        /*
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(phpEmailLogin))
        {

        }
        else
        {
            Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to provide a valid Email address'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $('#phpEmailLogin').val("");
                        $('#phpPasswordLogin').val("");
                        return;
                    }
                    else
                    {
                        $('#phpEmailLogin').val("");
                        $('#phpPasswordLogin').val("");
                        return;
                    }
                    })
                    

        }
        */      


        var parametros = {
                phpEmailLogin : phpEmailLogin,
                phpPasswordLogin : phpPasswordLogin
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'LogInClass.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () 
                {

                },
                success:  function (response) 
                { 

                    
                    if(response == '0')
                    {
                        Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Incorrect password or email'
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    
                    if (result.isConfirmed) {
                        $('#phpEmailLogin').val("");
                        $('#phpPasswordLogin').val("");
                        return;
                    }
                    else
                    {
                        $('#phpEmailLogin').val("");
                        $('#phpPasswordLogin').val("");
                        return;
                    }
                    })
                    }
                    else
                    {
                        window.location.href = "index.php";
                    }
                    



                    
                },
                error: function(jqXHR, textStatus, errorThrown){
                //window.alert(jqXHR);

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your registration has been completed',
                    showConfirmButton: false,
                    timer: 5000
                    })

                    setTimeout(function() {
                    
                    //window.location.href = "thanksRegister.php";

                }, 5000);


                //window.alert(errorThrown);



                }



        });
    }


</script>

    <?php include('assets/codeSnippets/navbar.php'); ?>

    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">









                <!-- LOG IN SECTION -->
                <div class="m-auto w-lg-75 w-xl-50" data-aos="fade-up" data-aos-delay="450" id="loginSection">
                    <div style="text-align: center;margin-bottom: 46px;"><a class="navbar-brand" href="index.php" style="color: rgb(0,0,0);font-weight: bold;letter-spacing: 1px;border-style: double;">&nbsp;Pluche LITE&nbsp;</a></div>

                    <!--action="assets/classes/logInClass.php" method="POST"    logInValidation($('#phpEmailLogin').val(), $('#phpPasswordLogin').val());-->

                    <form >
                        <div class="form-group mb-3"><label class="form-label text-secondary">Email</label><input  oninput="this.value = this.value.toUpperCase()"  id="phpEmailLogin"   name="phpEmailLogin"       class="form-control" type="text" required
                         
                        inputmode="email" placeholder="Email Address"></div>
                        <div class="form-group mb-3"><label class="form-label text-secondary">Password</label><input id="phpPasswordLogin" name="phpPasswordLogin" class="form-control" type="password" required  placeholder="Password"></div>
                        <button 
                        id = "logInButton"
                        class="btn btn-info mt-2" 
                        type="button"
                        onclick="loginFunction($('#phpEmailLogin').val(), $('#phpPasswordLogin').val());"
                        >Log In</button>
                    </form>

                    
                    <p class="mt-3 mb-0" onclick="hideLogin()" ><a class="text-info small" href="#">New here? Register here</a></p>
                </div>

                <!-- END OF LOG IN SECTION -->


                <!-- REGISTER SECTION -->
                <div data-aos="fade-up" data-aos-delay="450" class="p-5" id="registerSection">

                    <!-- LOGO -->
                    <div style="text-align: center;margin-bottom: 46px;"><a class="navbar-brand" href="index.php" style="color: rgb(0,0,0);font-weight: bold;letter-spacing: 1px;border-style: double;">&nbsp;Pluche LITE&nbsp;</a></div>
                    <div class="text-center"></div>
                    <!-- LOGO -->

                    <!--FORM PHP REGISTER  action="assets/classes/registerClass.php" method="POST" oninput="this.value = this.value.toUpperCase()"-->

                    <!-- FORM START -->
                    <form class="user" id="registerForm" enctype="multipart/form-data">


                    <label class="form-label text-secondary">Username</label>

                        <div class="mb-3">
                            <input 
                            class="form-control form-control-user"  
                            type="text" 
                            placeholder="Username" 
                            oninput="this.value = this.value.toUpperCase()" 
                            name="phpUsername" 
                            required 
                            id="phpUsernameRegister">
                        </div>
                    
                    <label class="form-label text-secondary">Email</label>

                        <div class="mb-3">
                            <input 
                            class="form-control form-control-user"  
                            type="text" 
                            id="phpEmailRegister" 
                            oninput="this.value = this.value.toUpperCase()" 
                            placeholder="Email Address" 
                            required 
                            name="phpEmail" 
                            inputmode="email">
                        </div>
                        

                        <div class="row mb-3">
                            
                    <label class="form-label text-secondary">Password</label>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input 
                                class="form-control form-control-user" 
                                type="password" 
                                id="password"  
                                placeholder="Password" 
                                required 
                                name="phpPassword">
                            </div>

                            <div class="col-sm-6">
                                <input 
                                class="form-control form-control-user" 
                                type="password" 
                                id="verifyPassword"  
                                placeholder="Repeat Password" 
                                required 
                                name="phpPasswordRegisterRepeat">
                            </div>

                        </div>


                    <div class="row mb-3">

                        <label class="form-label text-secondary">First Name</label>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input 
                                class="form-control form-control-user"  
                                type="text" 
                                oninput="this.value = this.value.toUpperCase()" 
                                placeholder="First Name"  
                                required name="phpFirstName" 
                                id="phpFirstNameRegister">
                            </div>

                            <label class="form-label text-secondary">Last Name</label>
                        
                            <div class="col-sm-6">
                                <input class="form-control form-control-user" 
                                type="text" 
                                oninput="this.value = this.value.toUpperCase()"  
                                placeholder="Last Name"  
                                name="phpLastName" 
                                required 
                                id="phpLastNameRegister">
                            </div>
                    </div>

                    
                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <div class="row mb-3">

                            <label class="form-label text-secondary">Gender</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phpGender" id="phpGender1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">MALE</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phpGender" id="phpGender2">
                                <label class="form-check-label" for="flexRadioDefault2">FEMALE</label>
                            </div>

                        </div>

                    </div>


                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <div class="row mb-3">

                            <label class="form-label text-secondary">Type of Account</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phpAccountType" id="phpAccountType1" checked>
                                <label class="form-check-label" for="flexRadioDefault3">CUSTOMER</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phpAccountType" id="phpAccountType2">
                                <label class="form-check-label" for="flexRadioDefault4">SELLER</label>
                            </div>

                        </div>

                    </div>


                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <div class="row mb-3">

                            <label class="form-label text-secondary">Profile Type</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phpProfileType" id="phpProfileType1" checked>
                                <label class="form-check-label" for="flexRadioDefault5">PUBLIC</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phpProfileType" id="phpProfileType2">
                                <label class="form-check-label" for="flexRadioDefault6">PRIVATE</label>
                            </div>

                        </div>

                    </div>

                        


                    <div class="row mb-3">

                        <label class="form-check-label" for="flexRadioDefault2">Date of Birth</label>
                        <input name="phpDateOfBirth" id="phpDateOfBirth" type="date"><br><br>

                    </div>


                    <div class="row mb-3">
                        <label class="form-check-label" for="flexRadioDefault2">Select Profile Picture:</label>


           

                        <input type="file" id="phpImage" name="phpImage"><br>

             

  
                    </div>


                    <div class="row mb-3">
                        <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                        <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                    </div>


                    <button 
                    class="btn btn-info mt-2 d-block btn-user w-100" 
                    id="submitBtn" 
                    type="button"
                    onclick="emailDuplicateValidation($('#phpEmailRegister').val());"
                    >Register Account</button>
                    <hr>


                    </form>
                    <!--FORM PHP REGISTER-->

                    <p class="mt-3 mb-0" onclick="showLogin()" ><a class="text-info small" href="#">Already have an account? Login!</a></p>

                </div>
                <!-- END OF REGISTER SECTION -->



            </div>
            <div class="col-lg-6 d-flex align-items-end" data-aos="fade-up" data-aos-duration="450" id="bg-block" style="background: url(&quot;assets/img/wallpaperbetter.com_1920x10802.jpg&quot;) center center / cover;">
                <p class="ms-auto small text-dark mb-2"><em>Photo by&nbsp;</em><a class="text-dark" href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank"><em>Aldain Austria</em></a><br></p>
            </div>
        </div>
    </div>


    <?php include('assets/codeSnippets/footerInclude.php'); ?>
	

</body>

</html>