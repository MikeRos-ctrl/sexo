<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); ?>
    <title>LIGHTS</title>

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>

<script>

            var search = "searchText";
            var category = "misc";


    $(document).ready(function() {
        $('#list-0').show();
        $('#list-1').hide();
        $('#list-2').hide();
        $('#list-3').hide();
        $('#list-4').hide();
        $('#list-5').hide();
        $('#list-6').hide();
        var search = $('#searchText').val();
        });




    function redirect()
    {
        window.location.href = 'search.php?search='+search+'&'+'category='+category+'';

    }

    function changeSort(opt)
    {
        switch(opt) {
        case 0:
            $('#list-0').show();
            $('#list-1').hide();
            $('#list-2').hide();
            $('#list-3').hide();
            $('#list-4').hide();
            $('#list-5').hide();
            $('#list-6').hide();
            break;
        case 1:
            $('#list-0').hide();
            $('#list-1').show();
            $('#list-2').hide();
            $('#list-3').hide();
            $('#list-4').hide();
            $('#list-5').hide();
            $('#list-6').hide();
            break;
        case 2:
            $('#list-0').hide();
            $('#list-1').hide();
            $('#list-2').show();
            $('#list-3').hide();
            $('#list-4').hide();
            $('#list-5').hide();
            $('#list-6').hide();
            break;
        case 3:
            $('#list-0').hide();
            $('#list-1').hide();
            $('#list-2').hide();
            $('#list-3').show();
            $('#list-4').hide();
            $('#list-5').hide();
            $('#list-6').hide();
            break;
        case 4:
            $('#list-0').hide();
            $('#list-1').hide();
            $('#list-2').hide();
            $('#list-3').hide();
            $('#list-4').show();
            $('#list-5').hide();
            $('#list-6').hide();
            break;
        case 5:
            $('#list-0').hide();
            $('#list-1').hide();
            $('#list-2').hide();
            $('#list-3').hide();
            $('#list-4').hide();
            $('#list-5').show();
            $('#list-6').hide();
            break;
        case 6:
            $('#list-0').hide();
            $('#list-1').hide();
            $('#list-2').hide();
            $('#list-3').hide();
            $('#list-4').hide();
            $('#list-5').hide();
            $('#list-6').show();
            break;
        default:
        }
    }




</script>

    <div id="profile-2" class="container profile profile-view" data-aos="fade-up" data-aos-duration="450" >
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
                <h1>Find Your Favorite</h1>
                <div data-reflow-type="product-search" data-reflow-show-button="true" data-reflow-search-url="search.php">
                    <div class="reflow-product-search">
                        <div id= "searchText" class="ref-input-wrapper"><input class="ref-search" type="text" inputmode="search" placeholder="Search Products" /><span class="ref-cancel-search" style="display: none;"></span></div>
                        <div class="ref-button" type="submit" style="display: block;">Search</div>
                    </div>
                </div>
                <hr />
                <div data-reflow-type="category-list" data-reflow-category-link="./search.php?category={id}"  data-reflow-layout="horizontal-bar"></div>
                    <div class="d-grid gap-2 d-md-block">
                        <!--<button class="btn" type="button" onclick="">Date ASC</button>-->
                        <button class="btn" type="button" onclick="changeSort(0);">Normal View</button>
                        <button class="btn" type="button" onclick="changeSort(1);">Date ASC</button>
                        <button class="btn" type="button" onclick="changeSort(2);">Date DSC</button>
                        <button class="btn" type="button" onclick="changeSort(3);">Price ASC</button>
                        <button class="btn" type="button" onclick="changeSort(4);">Price DSC</button>
                        <button class="btn" type="button" onclick="changeSort(5);">Name ASC</button>
                        <button class="btn" type="button" onclick="changeSort(6);">Name DSC</button>
                    </div>

            </div>
        </div>
    </form>
</div>


<div id="list-0" class="container profile profile-view">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
               
            <div 
 
            data-reflow-type="product-list" 
            data-reflow-product-link="/product.php?product={id}" 
            data-reflow-show="image, name, excerpt, price, pagination"          
            data-aos="fade-up" 
            data-aos-duration="450" 
            style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"
            ></div>
                   
            </div>
        </div>
    </form>
</div>



<div id="list-1" class="container profile profile-view">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
               
            <div 
             
            data-reflow-type="product-list" 
            data-reflow-product-link="/product.php?product={id}" 
            data-reflow-show="image, name, excerpt, price, pagination"   
            data-reflow-order="date_asc"          
            style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"
            ></div>
                   
            </div>
        </div>
    </form>
</div>




<div id="list-2" class="container profile profile-view">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
               
            <div 
             
            data-reflow-type="product-list" 
            data-reflow-product-link="/product.php?product={id}" 
            data-reflow-show="image, name, excerpt, price, pagination"       
            data-reflow-order="date_desc"          

            style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"
            ></div>
                   
            </div>
        </div>
    </form>
</div>


<div id="list-3" class="container profile profile-view">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
               
            <div 
             
            data-reflow-type="product-list" 
            data-reflow-product-link="/product.php?product={id}" 
            data-reflow-show="image, name, excerpt, price, pagination"      
            data-reflow-order="price_asc"          
            style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"
            ></div>
                   
            </div>
        </div>
    </form>
</div>



<div id="list-4"  class="container profile profile-view">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
               
            <div 
            
            data-reflow-type="product-list" 
            data-reflow-product-link="/product.php?product={id}" 
            data-reflow-show="image, name, excerpt, price, pagination"    
            data-reflow-order="price_desc"          
            style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"
            ></div>
                   
            </div>
        </div>
    </form>
</div>


<div id="list-5" class="container profile profile-view">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
               
            <div 
             
            data-reflow-type="product-list" 
            data-reflow-product-link="/product.php?product={id}" 
            data-reflow-show="image, name, excerpt, price, pagination"    
            data-reflow-order="name_asc"          
            style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"
            ></div>
                   
            </div>
        </div>
    </form>
</div>


<div id="list-6" class="container profile profile-view">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
               
            <div 
            data-reflow-type="product-list" 
            data-reflow-product-link="/product.php?product={id}" 
            data-reflow-show="image, name, excerpt, price, pagination"   
            data-reflow-order="name_desc"          
            style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"
            ></div>
                   
            </div>
        </div>
    </form>
</div>

    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>