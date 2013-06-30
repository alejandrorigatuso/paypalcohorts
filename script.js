
google.load("visualization", "1", {
    packages:["corechart"]
});



function drawCohort(google,analisis) {
    var data = google.visualization.arrayToDataTable(analisis);
    var options = {
        title: 'Cohort Analysis of Sales',
        vAxis: {
            title: 'Sales'
        },
        isStacked: true
    };
    var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawCohortOfSimulation(google,analisis) {
    var data = google.visualization.arrayToDataTable(analisis);
    var options = {
        title: 'Cohort Analysis of Users',
        vAxis: {
            title: 'Users'
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
    
    Cohorts=cohortsInput.value;
    Retention=retentionInput.value;
    Newusers=newusersInput.value;
    Virality=viralityInput.value;
    
    xmlhttp.open("GET","simulate.php?cohorts="+Cohorts+"&retention="+Retention+"&newusers="+Newusers+"&virality="+Virality,true);
    xmlhttp.send();
    
    
}