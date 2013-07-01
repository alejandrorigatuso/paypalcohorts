
google.load("visualization", "1", {
    packages:["corechart"]
});



function drawCohort(google,analisis) {
    var data = google.visualization.arrayToDataTable(analisis);
    var options = {
        vAxis: {
            title: 'Revenue'
        },
        isStacked: true
    };
    var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawCohortOfSimulation(google,analisis) {
    var data = google.visualization.arrayToDataTable(analisis);
    var options = {
       
       

        vAxis: {
            title: 'Users'
            
        },
        
        hAxis: {
            title: 'Time'
        },
        
        legend: {
            position: 'none'
        },
        
        isStacked: true
    };
    var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_simulation'));
    chart.draw(data, options);
}


function parse(google){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            cohortdata=xmlhttp.responseText;
            cohorts=JSON.parse(cohortdata);
            str=document.getElementById("shortTermRetention");
            str.innerHTML=Math.round(cohorts[2] * 100)+ "%";
            str.style.color="blue";
            ltr=document.getElementById("longTermRetention");
            ltr.innerHTML=Math.round(cohorts[3] * 100) + "%";
            ltr.style.color="blue";
            drawCohort(google,cohorts[1]);
            $('#results').show();
            $('#waitimage').hide();
            $('#results').show();
            $('#chart_div').show();
            $('#disclaimer').hide();
        }
    };
    xmlhttp.open("GET","parse.php?fname="+filename,true);
    xmlhttp.send();
}


function simulate(google){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            cohortdata=xmlhttp.responseText;
            cohorts=JSON.parse(cohortdata);         
            drawCohortOfSimulation(google,cohorts[1]);
        
        }
    };
    
    //Cohorts=cohortsInput.value;
    Cohorts=$('#sliderCohorts').slider('value');
    
    //Retention=retentionInput.value;
    Retention=$('#sliderRetention').slider('value');

    //Newusers=newusersInput.value;
    Newusers=$('#sliderNewUsers').slider('value');

    //Virality=viralityInput.value;
    Virality=$('#sliderVirality').slider('value');
    
    //InitialUsers=initialInput.value;
    InitialUsers=$('#sliderInitialUsers').slider('value');

    
    xmlhttp.open("GET","simulate.php?cohorts="+Cohorts+"&retention="+Retention+"&newusers="+Newusers+"&virality="+Virality+"&initialusers="+InitialUsers,true);
    xmlhttp.send();
    
    
}