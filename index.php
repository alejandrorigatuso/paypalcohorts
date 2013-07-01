
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
                
                updateInputs();                                 
                simulate(google);
                
                
                
            }
            
            function updateInputs() {
                cohortsInput.value=$('#sliderCohorts').slider('value');
                retentionInput.value=$('#sliderRetention').slider('value');
                newusersInput.value=$('#sliderNewUsers').slider('value');
                viralityInput.value=$('#sliderVirality').slider('value');
                initialUsersInput.value=$('#sliderInitialUsers').slider('value'); 
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

    <style>
        .disclaimer {
            padding: 5px 0;
            text-align: center;
            background-color: #ffffff;

            font-size:10px;
            color:black;
        }


        .jumbotron {
            position: relative;
            padding: 10px 0;
            font-size:14px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 3px rgba(0,0,0,.4), 0 0 30px rgba(0,0,0,.075);
            background: #020031;
            background: -moz-linear-gradient(45deg, #020031 0%, #6d3353 100%);
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#020031), color-stop(100%,#6d3353));
            background: -webkit-linear-gradient(45deg, #020031 0%,#6d3353 100%);
            background: -o-linear-gradient(45deg, #020031 0%,#6d3353 100%);
            background: -ms-linear-gradient(45deg, #020031 0%,#6d3353 100%);
            background: linear-gradient(5deg, rgb(0, 82, 255) 0%,rgb(43, 30, 25) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#020031', endColorstr='#6d3353',GradientType=1 );
            -webkit-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
            -moz-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
            box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
        }

        .gradient {

            background: #020031;
            background: -moz-linear-gradient(45deg, #020031 0%, #6d3353 100%);
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#020031), color-stop(100%,#6d3353));
            background: -webkit-linear-gradient(45deg, #020031 0%,#6d3353 100%);
            background: -o-linear-gradient(45deg, #020031 0%,#6d3353 100%);
            background: -ms-linear-gradient(45deg, #020031 0%,#6d3353 100%);
            background: linear-gradient(45deg, #020031 0%,#6d3353 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#020031', endColorstr='#6d3353',GradientType=1 );
            -webkit-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
            -moz-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
            box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
        }
    </style>



<body>



    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
    <script src="js/bootstrap.min.js"></script>

    <div>
        <div class="">
            <div class="jumbotron">
                <br/>
                <h1>Cohort Analysis Visualizer</h1>
                <br/>
                <h3>Simulate the growth of your startup and perform your own cohort analysis using PayPal data!</h3>
                <p>This tool was created for the <a href="http://toptal.com/blog">Toptal Engineering blog</a> along with <a href="http://www.toptal.com/data-science/growing-growth-perform-your-own-cohort-analysis">this</a> article that explains how it works. Download the open source code <a href="https://github.com/alejandrorigatuso/paypalcohorts">here</a>.</p>
            </div>

            <div class="disclaimer" id="disclaimer" class="row-fluid">
                <p>Note: if you upload your PayPal logs, they'll be placed temporarily on my server for processing. Of course, I won't be accessing them, nor storing them permanently (they'll be deleted as soon as the data is displayed), but if you prefer, feel free to use the <a href="https://github.com/alejandrorigatuso/paypalcohorts">open-source solution provided</a>.
                    BTW, I'm Alejandro Rigatuso, founder of <a href="http://postcron.com">Postcron.com</a>, an easy way to schedule posts on Facebook and Twitter.  Feel free to contact me at <a href="mailto:alejandro@postcron.com">alejandro@postcron.com</a>.</p>


            </div>


            <img id="waitimage" src="img/39.gif" style="display: block;margin-left: auto;margin-right: auto; display:none"></img>


            <div id="simulator">
                <div class="row-fluid">
                    <div class="span2"></div>
                    <div class="span10">
                        <h3>Simulate Startup Growth Based on Retention and Virality</h3>
                    </div>
                </div>


                <div class="row-fluid">


                    <div class="span2"></div>
                    <div class="span3" >


                        <fieldset>
                            <div id="sliders">
                                <span>Number of Cohorts</span>
                                <input type="text" value="36"  id="cohortsInput"  >
                                <div id="sliderCohorts"></div>
                                <br>

                                <span>Initial users (A.K.A. big launch!</span>
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


                    </div>



                    <div  id="chart_simulation" class="span6" style="height:400px"> </div>
                </div>


            </div>


            <div id="uploader" class="row-fluid">

                <br>
                <br>

                <div class="row-fluid">

                    <div class="span2"></div>
                    <div class="span10">
                        <h3>Perform (and Visualize) Your Own Cohort Analysis</h3>
                    </div>
                </div>


                <div class="row-fluid">

                    <div class="span2"></div>
                    <div class="span10" >

                        <h4>First, download your PayPal log</h4>

                        <ul>
                            <li>Login to PayPal.</li>
                            <li>Click on History -> Download History.</li>
                            <li>On the resulting page, select the date range of the transactions you want to download.</li>
                            <li>Make sure to select "Comma Delimited, All Activity" as 'File Type'</li>
                            <li>Make sure to check the "Include Shopping Cart Details" option.</li>
                            <li>Click on 'Download History'.</li>
                            <li>PayPal will start generating the CSV file. Once the file is ready, you will receive a notification via email. Wait for the notification email.</li>
                            <li>Do the following after the file is generated.</li>
                            <li>Come back to History -> Download History.</li>
                            <li>Come to "Download Recent History Logs" page.</li>
                            <li>Select the log file.</li>
                            <li>Click on "Download Log".</li>
                            <li>A CSV file will be downloaded. </li>
                        </ul>
                    </div>

                </div>

                <div class="row-fluid">
                    <div class="span2"></div>

                    <div class="span10">
                        <h4>Second, upload the log file</h4>

                        <div>
                            <form action="upload_file.php" method="post"
                                  enctype="multipart/form-data">
                                <input type="file" name="file" id="file"><br>
                                <input id="submitButton" type="submit" name="submit" value="Click Here to Discover Your Retention Rates" class="btn btn-primary btn-large" style="display:none">
                            </form>
                        </div>
                    </div>
                    <div class="span2"></div>
                </div>

            </div>



        </div>



        <div id="readyToParse" style="display:none;text-align:center" >

            <div id="results" style="display:none; text-align: center; border: 1px solid black; padding: 5px; margin-left: 40%; margin-right: 40%;margin-top: 1%;
                 ">
                <p>Short Term Retention Rate: <span id="shortTermRetention" style="color: blue;font-size: 20px;border: blue;">0.71%</span></p>
                <p>Long Term Retention Rate: <span id="longTermRetention" style="color: blue;font-size: 20px;border: blue;">0.87%</span></p>    


            </div>

            <div  id="chart_div" style="height:400px;" ></div>



        </div>


        <div  class="footer" style="
              background: whitesmoke;
              padding:20px;
              font-size:10px
              ">

            <img class="img-circle" src="https://graph.facebook.com/558724844/picture?type=square" title="Alejandro Rigatuso" style="
                 position: relative;
                 border-style: solid;
                 border-width: 1px;
                 border-color: gray;
                 float:left;
                 margin-right: 15px;
                 ">

            <p>Note: if you upload your PayPal logs, they'll be placed temporarily on my server for processing. Of course, I won't be accessing them, nor storing them permanently (they'll be deleted as soon as the data is displayed), but if you prefer, feel free to use the <a href="https://github.com/alejandrorigatuso/paypalcohorts">open-source solution provided</a>.
                BTW, I'm Alejandro Rigatuso, founder of <a href="http://postcron.com">Postcron.com</a>, an easy way to schedule posts on Facebook and Twitter.  Feel free to contact me at <a href="mailto:alejandro@postcron.com">alejandro@postcron.com</a>.</p>

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
              
        
        
        
    ///
    $( "#sliderVirality" ).on( "slidechange", function( event, ui ) {       
        viralityInput.value=$('#sliderVirality').slider('value');

     
    } );      
      
                
    $( "#sliderRetention" ).on( "slidechange", function( event, ui ) {       
        retentionInput.value=$('#sliderRetention').slider('value');

     
    } ); 
           
    $( "#sliderNewUsers" ).on( "slidechange", function( event, ui ) {       
        newusersInput.value=$('#sliderNewUsers').slider('value');

     
    } );           
    $( "#sliderInitialUsers" ).on( "slidechange", function( event, ui ) {       
        initialUsersInput.value=$('#sliderInitialUsers').slider('value');

     
    } );           
    $( "#sliderCohorts" ).on( "slidechange", function( event, ui ) {       
        cohortsInput.value=$('#sliderCohorts').slider('value');
     
    } ); 
 
</script>




