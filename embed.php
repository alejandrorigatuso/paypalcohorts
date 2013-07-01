
<?php
$filename = $_GET['fname'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PayPal Cohort Analysis</title>
        <!-- Bootstrap -->
        <meta charset="utf-8" />

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <!--<script type="text/javascript" src="js/jquery-2.0.2.js"></script>-->
        <script type="text/javascript" src="script.js"></script>



        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <script>
            
            
            function changeCohorts() {
                
                cohortsInput.value=$('#sliderCohorts').slider('value');
                retentionInput.value=$('#sliderRetention').slider('value');
                newusersInput.value=$('#sliderNewUsers').slider('value');
                viralityInput.value=$('#sliderVirality').slider('value');
                initialUsersInput.value=$('#sliderInitialUsers').slider('value');                 
                    
                simulate(google);
               
                
                
            }
            
            $(function() {
                  
               
    
                $( "#sliderCohorts" ).slider({
                    orientation: "horizontal",
                    range: "min",
                    max: 60,
                    value: 24,
                    slide: changeCohorts
                });
                $( "#sliderRetention" ).slider({
                    orientation: "horizontal",
                    range: "max",
                    max: 1,
                    min:0,
                    value: 0.8,
                    step: 0.01,
                    slide: changeCohorts
                   
                });
                $( "#sliderNewUsers" ).slider({
                    orientation: "horizontal",
                    range: "min",
                    max: 100000,
                    min:0,
                    value: 1000,
                    slide: changeCohorts
                    
                });
                $( "#sliderVirality" ).slider({
                    orientation: "horizontal",
                    range: "min",
                    max: 2,
                    min:0,
                    value: 0.2,
                    step:0.01,
                    slide: changeCohorts
                    
                });
                
                $( "#sliderInitialUsers" ).slider({
                    orientation: "horizontal",
                    range: "min",
                    max: 100000,
                    min:0,
                    value: 1000,
                    step:10,
                    slide: changeCohorts
                   
                });
            
            });
           
           
        </script>


    <body>


        <script>
            filename="<?php echo $filename ?>";
        </script>

    </head>




<body>



    <script src="js/bootstrap.min.js"></script>



    <div id="simulator">


        <div class="row-fluid" style="text-align:center">


            <fieldset>
                <div id="sliders">
                    <span>Number of Cohorts</span>
                    <input type="text" value="26"  id="cohortsInput"  >
                    <div id="sliderCohorts"></div>
                    <br>

                    <span>Initial users (A.K.A. big launch!)</span>
                    <input type="text" value="1000" id="initialUsersInput">
                    <div id="sliderInitialUsers"></div>
                    <br>

                    <span>New users per month (acquired organically or through paid advertisement)</span>
                    <input type="text" value="1000" id="newusersInput">
                    <div id="sliderNewUsers"></div>
                    <br>
                    <span>Monthly Retention</span>
                    <input type="text" value="0.85" id="retentionInput">
                    <div id="sliderRetention"></div>
                    <br>


                    <span>Virality ('K', or 'viral coefficient')</span>
                    <input type="text" value="0.10" id="viralityInput">
                    <div id="sliderVirality"></div>
                    <br>
                </div>



                <input type="button"  value="Click here to simulate" class="btn btn-primary btn-large" onclick="simulate(google)">
            </fieldset>





            <div  id="chart_simulation" style="height:400px"> </div>
        </div>


    </div>




</body>
</html>

<script>
    if (filename!="") {
        $('#readyToParse').show();
        $('#simulator').hide();
        $('#uploader').hide();
        parse(google);
        $('#waitimage').css('display','block');
                        
    } ;
                
                    
    $('#file').css('color','white');
                    
    
    $('input[type=file]').change(function() { 
        // select the form and submit
        $('#file').css('color','black');
        $('#submitButton').show();
    });
                    
                    
    $("#sliders input").change(function() {
        $('#sliderCohorts').slider('value', cohortsInput.value);
        $('#sliderRetention').slider('value', retentionInput.value);
        $('#sliderNewUsers').slider('value', newusersInput.value);
        $('#sliderVirality').slider('value', viralityInput.value);
        $('#sliderInitialUsers').slider('value', initialUsersInput.value);
                    
        simulate(google);
                    
                   
    });
                    
            
                   
    $(document).ready(function() {
        if (filename=="") {
            simulate(google);
        }});
            
            
    $("#sliders input").css('width',50);
                
                
 
</script>




