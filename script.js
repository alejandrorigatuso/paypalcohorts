google.load('visualization', '1', {
    packages:['table']
});

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
            respuesta=xmlhttp.responseText;            
          
     
            cohorts=JSON.parse(respuesta);
           

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
    }

     
    xmlhttp.open("GET","parse.php?fname="+filename,true);
    xmlhttp.send();


}


