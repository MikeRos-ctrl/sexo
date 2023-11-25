<?php




$cookie_name = "user";
$cookie_name_type = "type";


if(isset($_COOKIE["user"]))
{
    if($_COOKIE[$cookie_name] == '')
    {
        ?>
        <script>
                $('#profile').hide();
                $('#loginNavbar').show();
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
                $('#profile').show();
                $('#loginNavbar').hide();
                isLogged = true;
        </script>
        <?php
    }
    if($_COOKIE[$cookie_name_type] == '1')
    {
        ?>
        <script>
                $('#soldProducts').hide();
                $('#validateProduct').hide();
                $('#validateCategory').hide();
                $('#requestProduct').hide();
                $('#requestCategory').hide();
                $('#myProducts').hide();
        </script>
        <?php
    }
    if($_COOKIE[$cookie_name_type] == '2')
    {
        ?>
        <script>
                $('#validateProduct').hide();
                $('#validateCategory').hide();
                $('#phpListId').hide();
                $('#addToList').hide();
                $('#cartNavbar').hide();
                $('#lists').hide();
                $('#orders').hide();

        </script>
        <?php
    }   
    if($_COOKIE[$cookie_name_type] == '3')
    {
        ?>
        <script>
                $('#myProducts').hide();
                $('#phpListId').hide();
                $('#addToList').hide();
                $('#cartNavbar').hide();
                $('#lists').hide();
                $('#orders').hide();

        </script>
        <?php
    }   
}
else
{
    ?>
    <script>
            $('#profile').hide();
            $('#loginNavbar').show();
            $('#phpListId').hide();
            $('#addToList').hide();
    </script>
    <?php
}
?>