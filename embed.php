<!DOCTYPE html>
<html>
    <head>
        <title>Cohort Analysis Simulator</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script type="text/javascript" src="js/jquery-2.0.2.js"></script>
        <script type="text/javascript" src="script.js"></script>

    </head>



    <body>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>


        <div id="simulator">
            <div class="row">

                <div class="span4" >


                    <fieldset>
                        <label>Number of Cohorts</label>
                        <input type="text" value="36"  id="cohortsInput"  >

                        <label>Retention</label>
                        <input type="text" value="0.85" id="retentionInput">

                        <label>Virality (K or Viral Coefficient)</label>
                        <input type="text" value="0.10" id="viralityInput">

                        <label>New users per month acquired organically or by paid advertisement</label>
                        <input type="text" value="1000" id="newusersInput">

                        <input type="button"  value="Click here to simulate" class="btn btn-primary btn-large" onclick="simulate(google)">
                    </fieldset>


                </div>

                <div  id="chart_simulation" class="span8" style="height:300px"> </div>
            </div>


        </div>

    </body>
</html>

<script>
                  
    simulate(google);
                 
                    
    $('fieldset').change(function() {
        simulate(google);
    });
                    
</script>





