var user;
var password;
var isLogged = false;
var returnPage = "index.php";



$(document).ready(function() 
{
    
    isLoggedVal();


});



function isLoggedVal()
{



}





function hideLogin()
{
    $('#loginSection').hide();
    $('#registerSection').show();
}

function showLogin()
{
    $('#loginSection').show();
    $('#registerSection').hide();
}