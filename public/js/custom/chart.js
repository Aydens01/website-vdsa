$(document).ready(function(){
    /*
    var familles = Array()

    $.each(selectValues, function(key, value) {   
        $('#famille')
            .append($("<option></option>")
                       .attr("value",key)
                       .text(value)); 
    });

   $.ajax({
    url:'/test/modelFamille',
    type:"POST",
    success:
    function(data, status){
        console.log(data);
        var data = $.parseJSON(JSON.stringify(data));
        console.log(status);
        console.log(data);
        data = data[0];
        
        $.each(data, function(elem) {   
            console.log(elem);
        });
        
    }
})
    */
    $("#CA").prop("checked", true);

    $(".target").change(function(){
        console.log('ok');
        var data = {};
        data.freq = $("#frequence").val();
        data.margeCA = $('input[name=options]:checked').val();
        data.client = $("#client").val();
        data.famille = $("#famille").val();
        data.sousFamille = $("#sousFamille").val();
        
        $.ajax({
            url:'/test/majDataGraph',
            type:"POST",
            data: data,
            dataType:"json",
            success:
            function(data, status){
                
                var data = $.parseJSON(JSON.stringify(data));
                console.log(data);
                data = data[0];
                var items = [];

                $.each( data, function( key, val ) {
                  items.push( "<li id='" + key + "'>" + val + "</li>" );
                });
               
                $( "<ul/>", {
                  "class": "my-new-list",
                  html: items.join( "" )
                }).appendTo( "#ici" );
                
            }
        })
    });

    $("#famille").change(function(){
        var data = {};
        data.famille = $("#famille").val();
        
        $.ajax({
            url:'/test/majFamilleSousFam',
            type:"POST",
            data: data,
            dataType:"json",
            success:
            function(data, status){
                
                var data = $.parseJSON(JSON.stringify(data));

                $("#sousFamille").html(
                    '<option value="0">Sous Famille (toutes par default)</option>'
                );
                for (var i = 0; i < data.length; i++) {

                    $("#sousFamille").append(
                        "<option value="+ data[i]["idSousFamille"] +">"+ data[i]["libelle"] +"</option>"   
                    );
                }
            }
        })
    });
});
    /*
    window.onload = function () {
    var title = null TODO: récupérer le titre du graphique
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: title
        },
        axisX:{
            valueFormatString: "DD MMM",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: "Number of Visits",
            crosshair: {
                enabled: true
            }
        },
        toolTip:{
            shared:true
        },  
        legend:{
            cursor:"pointer",
            verticalAlign: "bottom",
            horizontalAlign: "left",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data: [{
            type: "line",
            showInLegend: true,
            name: "Total Visit",
            markerType: "square",
            xValueFormatString: "DD MMM, YYYY",
            color: "#FF0101",
            dataPoints: [
                { x: new Date(2017, 0, 3), y: 650 },
                { x: new Date(2017, 0, 4), y: 700 },
                { x: new Date(2017, 0, 5), y: 710 },
                { x: new Date(2017, 0, 6), y: 658 },
                { x: new Date(2017, 0, 7), y: 734 },
                { x: new Date(2017, 0, 8), y: 963 },
                { x: new Date(2017, 0, 9), y: 847 },
                { x: new Date(2017, 0, 10), y: 853 },
                { x: new Date(2017, 0, 11), y: 869 },
                { x: new Date(2017, 0, 12), y: 943 },
                { x: new Date(2017, 0, 13), y: 970 },
                { x: new Date(2017, 0, 14), y: 869 },
                { x: new Date(2017, 0, 15), y: 890 },
                { x: new Date(2017, 0, 16), y: 930 }
            ]
        },
        {
            type: "line",
            showInLegend: true,
            name: "Unique Visit",
            lineDashType: "dash",
            color: "#00A5E6",
            dataPoints: [
                { x: new Date(2017, 0, 3), y: 510 },
                { x: new Date(2017, 0, 4), y: 560 },
                { x: new Date(2017, 0, 5), y: 540 },
                { x: new Date(2017, 0, 6), y: 558 },
                { x: new Date(2017, 0, 7), y: 544 },
                { x: new Date(2017, 0, 8), y: 693 },
                { x: new Date(2017, 0, 9), y: 657 },
                { x: new Date(2017, 0, 10), y: 663 },
                { x: new Date(2017, 0, 11), y: 639 },
                { x: new Date(2017, 0, 12), y: 673 },
                { x: new Date(2017, 0, 13), y: 660 },
                { x: new Date(2017, 0, 14), y: 562 },
                { x: new Date(2017, 0, 15), y: 643 },
                { x: new Date(2017, 0, 16), y: 570 }
            ]
        }]
    });
    chart.render();

    function toogleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
}
*/