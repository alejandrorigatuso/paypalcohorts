
<?php
$filename = $_GET['fname'];
?>


<!DOCTYPE html>
<html>
    <head>
        <title>PayPal Cohort Analysis</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script type="text/javascript" src="/js/jquery-2.0.2.js"></script>
        <script type="text/javascript" src="script.js"></script>

        <script>
            filename="<?php echo $filename ?>";
        </script>

    </head>

    <style>
        .disclaimer {
            padding: 5px 0;
            text-align: center;
            background-color: #ffffff;
            /*            border-top: 1px solid #fff;
                        border-bottom: 1px solid #ddd;*/
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

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <div>
            <div class="">
                <div class="jumbotron">
                    <br/>
                    <h1>What's Your Retention Rate?</h1>
                    <br/>
                    <h3>Use this tool to perform your own cohort analysis through your PayPal data</h3>
                    <p>This tool was created for the <a href="toptal.com/blog">Toptal Engineering blog</a> along with <a href="http://www.toptal.com/blog">this</a> article that explains how it works. Download the open source code <a href="https://github.com/alejandrorigatuso/paypalcohorts">here</a>.</p>
                </div>

                <div class="disclaimer" id="disclaimer">
                    <p>Note: if you upload your PayPal logs, they'll be placed temporarily on my server for processing. Of course, I won't be accessing them, nor storing them permanently (they'll be deleted as soon as the data is displayed), but if you prefer, feel free to use the <a href="https://github.com/alejandrorigatuso/paypalcohorts">open-source solution provided</a>.</p>

                </div>


                <img id="waitimage" src="39.gif" style="display: block;margin-left: auto;margin-right: auto; display:none"></img>


                <div id="uploader" class="row-fluid">
                    <div class="row">
                        <div class="span2"></div>
                        <h3>How does it works?</h3>
                    </div>


                    <div class="row">
                        <div class="span2"></div>
                        <div class="span4" >

                            <h4>First, download your PayPal log</h4>
                            <ul>
                                <li>Login to PayPal.</li>
                                <li>Click on History -> Download History.</li>
                                <li>On the resulting page, select date range of the transactions you want to download.</li>
                                <li>Make sure to select "Comma Delimited, All Activity" as File Type.</li>
                                <li>Make sure to check "Include Shopping Cart details" option.</li>
                                <li>Click on Download History button.</li>
                                <li>PayPal will start generating the CSV file. Once the file is ready, you will receive a notification via email.</li>
                                <li>Do the following after the file is generated.</li>
                                <li>Come back to History -> Download History.</li>
                                <li>Come to "Download Recent History Logs" page.</li>
                                <li>Select the log file.</li>
                                <li>Click on "Download Log".</li>
                                <li>A CSV file will be downloaded. </li>
                            </ul>
                        </div>

                        <div class="span4">
                            <h4>Second, upload the log file</h4>
                            <div class="span1"></div>

                            <div class="span4">
                                <form action="upload_file.php" method="post"
                                      enctype="multipart/form-data">
                                    <input type="file" name="file" id="file"><br>
                                    <input type="submit" name="submit" value="Click Here to Discover Your Retention Rates" class="btn btn-primary btn-large">
                                </form>
                            </div>
                        </div>
                        <div class="span2"></div>
                    </div>
                </div>



                <div id="readyToParse" style="display:none" >


                    <div id="results" style="display:none; text-align: center; border: 1px solid black; padding: 5px; margin-left: 40%; margin-right: 40%;margin-top: 1%;
                         ">
                        <p>Short Term Retention Rate: <span id="shortTermRetention" style="color: blue;font-size: 20px;border: blue;">0.71%</span></p>
                        <p>Long Term Retention Rate: <span id="longTermRetention" style="color: blue;font-size: 20px;border: blue;">0.87%</span></p>    


                    </div>

                    <div  id="chart_div" style="height:400px;" ></div>

                </div>



                <div  class="footer" style="
                      background: whitesmoke;
                      margin-left: 60%;
                      font-size: 12px;
                      position: absolute;
                      top: 85%;
                      border-radius: 50px;
                      padding: 15px 10px 0px 10px;
                      border-width: 1px;
                      border-color: lightgray;
                      border-style: solid;
                      margin-right: 15px;
                      ">
                    <img class="img-circle" src="https://graph.facebook.com/558724844/picture?type=square" title="Alejandro Rigatuso" style="
                         position: relative;
                         border-style: solid;
                         border-width: 1px;
                         border-color: gray;
                         float:left;
                         margin-right: 15px;
                         ">
                    <p>Created by Alejandro Rigatuso for the <a href="http://www.toptal.com/blog">Toptal Engineering blog </a>. Alejandro  is the founder of <a href="http://postcron.com">Postcron.com</a>, an easy way to schedule posts on Facebook and Twitter. You can contact him at alejandro@postcron.com</p>

                </div>




                </body>
                </html>

                <script>
                    if (filename!="") {
                        $('#readyToParse').show();
                        $('#uploader').hide();
                        parse(google);
                        $('#waitimage').css('display','block');
                        
                    }
                    $('#file').css('color','white');
                    
                    $('#file').click(function() {
                        $('#file').css('color','black');
                    })
    
                </script>




