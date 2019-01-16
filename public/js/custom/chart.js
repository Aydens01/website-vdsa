function ajoutData(elem, annee, colonne){

    switch (elem["MONTH(date)"]) {
        case "1":
            annee.jan = elem[colonne];
            break;

        case "2":
            annee.feb = elem[colonne];
            break;

        case "3":
            annee.mar = elem[colonne];
            break;

        case "4":
            annee.avr = elem[colonne];
            break;

        case "5":
            annee.mai = elem[colonne];
            break;

        case "6":
            annee.jun = elem[colonne];
            break;

        case "7":
            annee.jui = elem[colonne];
            break;

        case "8":
            annee.aou = elem[colonne];
            break;

        case "9":
            annee.sep = elem[colonne];
            break;

        case "10":
            annee.oct = elem[colonne];
            break;

        case "11":
            annee.nov = elem[colonne];
            break;
        
        case "12":
            annee.dec = elem[colonne];
            break;
    
        default:
            break;
    }

    return annee;

}

function graph(data, margeCA){

    var anneeN = {
        jan:0,
        feb:0,
        mar:0,
        avr:0,
        mai:0,
        jun:0,
        jui:0,
        aou:0,
        sep:0,
        oct:0,
        nov:0,
        dec:0
    }

    var anneeN1 = {
        jan:0,
        feb:0,
        mar:0,
        avr:0,
        mai:0,
        jun:0,
        jui:0,
        aou:0,
        sep:0,
        oct:0,
        nov:0,
        dec:0
    }
    
    var max = 0;
    for (var i = 0; i < data.length; i++) {
        if (parseInt(data[i]["YEAR(date)"]) > max){
            max = parseInt(data[i]["YEAR(date)"]);
        };      
    }

    if (margeCA == "CA"){
        var margeCASum = "SUM(CA)";
        var axeY = "Chiffre d'affaire";
        var titreG = "du chiffre d'affaire";
    } else {
        var margeCASum = "SUM(marge)";
        var axeY = "Marge";
        var titreG = "de la marge";
    }

    for (var i = 0; i < data.length; i++) {
        var elem = data[i];

        switch (elem["YEAR(date)"]) {
            case String(max-1):
                annee2016 = ajoutData(elem, anneeN1, margeCASum);
                break;
            
            case String(max):
                annee2017 = ajoutData(elem, anneeN, margeCASum);
                break;

            default:
                break;
        }
    }

    
    console.log(annee2017);
    var title = "Comparatif " + titreG + " ("+ String(max-1) +"-"+ String(max)+ ")"; //TODO: récupérer le titre du graphique
    var chart = new CanvasJS.Chart("ici", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: title
        },
        axisX:{
            valueFormatString: "MMM",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: axeY,
            crosshair: {
                enabled: true
            }
        },
        toolTip:{
            shared:true,
            contentFormatter: function(e) {
                var str = "";
                for (var i = 0; i< e.entries.length; i++) {
                    var tmp = "<strong>"+"<span style='color:"+e.entries[i].dataSeries.color+";'>"+e.entries[i].dataSeries.name +" : </span>"+ e.entries[i].dataPoint.y+"€</strong> </br>";
                    str = str.concat(tmp);
                }
                var variation = ((e.entries[0].dataPoint.y)- (e.entries[1].dataPoint.y))/ (e.entries[1].dataPoint.y);
                variation *= 100;
                if (variation >= 0){
                    tmp = "<strong>Variation : <span style='color:#0CDE00;'>+"+String(Math.round(parseFloat(variation)*100)/100)+"%</span></strong>";
                }else{
                     tmp = "<strong>Variation : <span style='color:red;'> "+String(Math.round(parseFloat(variation)*100)/100)+"%</span></strong>";
                }
                str = str.concat(tmp);
                return(str);
            },
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
            name: String(max) + " (" + margeCA + ")",
            markerType: "square",
            xValueFormatString: "MMM, YYYY",
            //toolTipContent: "Variation",
            color: "#FF0101",
            dataPoints: [
                { x: new Date(2017, 0, 1), y: parseInt(annee2017.jan) },
                { x: new Date(2017, 1, 2), y: parseInt(annee2017.feb) },
                { x: new Date(2017, 2, 3), y: parseInt(annee2017.mar) },
                { x: new Date(2017, 3, 4), y: parseInt(annee2017.avr) },
                { x: new Date(2017, 4, 5), y: parseInt(annee2017.mai) },
                { x: new Date(2017, 5, 6), y: parseInt(annee2017.jun) },
                { x: new Date(2017, 6, 7), y: parseInt(annee2017.jui) },
                { x: new Date(2017, 7, 8), y: parseInt(annee2017.aou) },
                { x: new Date(2017, 8, 9), y: parseInt(annee2017.sep) },
                { x: new Date(2017, 9, 10), y: parseInt(annee2017.oct) },
                { x: new Date(2017, 10, 11), y: parseInt(annee2017.nov) },
                { x: new Date(2017, 11, 12), y: parseInt(annee2017.dec) }
                
            ]
        },
        {
            type: "line",
            showInLegend: true,
            name: String(max-1) + " (" + margeCA + ")",
            lineDashType: "dash",
            color: "#00A5E6",
            dataPoints: [
                { x: new Date(2017, 0, 1), y: parseInt(annee2016.jan) },
                { x: new Date(2017, 1, 2), y: parseInt(annee2016.feb) },
                { x: new Date(2017, 2, 3), y: parseInt(annee2016.mar) },
                { x: new Date(2017, 3, 4), y: parseInt(annee2016.avr) },
                { x: new Date(2017, 4, 5), y: parseInt(annee2016.mai) },
                { x: new Date(2017, 5, 6), y: parseInt(annee2016.jun) },
                { x: new Date(2017, 6, 7), y: parseInt(annee2016.jui) },
                { x: new Date(2017, 7, 8), y: parseInt(annee2016.aou) },
                { x: new Date(2017, 8, 9), y: parseInt(annee2016.sep) },
                { x: new Date(2017, 9, 10), y: parseInt(annee2016.oct) },
                { x: new Date(2017, 10, 11), y: parseInt(annee2016.nov) },
                { x: new Date(2017, 11, 12), y: parseInt(annee2016.dec) }
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

function ajaxGraph(){
    var data = {};
    data.freq = $("#frequence").val();
    data.margeCA = $('input[name=options]:checked').val();
    data.client = $("#client").val();
    data.famille = $("#famille").val();
    data.sousFamille = $("#sousFamille").val();
    var margeCA = data.margeCA;
    $.ajax({
        url:'/test/majDataGraph',
        type:"POST",
        data: data,
        dataType:"json",
        success:
        function(data, status){
            
            var data = $.parseJSON(JSON.stringify(data));
            graph(data, margeCA);

        }
    })
}


$(document).ready(function(){

    $("#CA").prop("checked", true);

    ajaxGraph();
    

    $(".target").change(function(){
        console.log('ok');
        ajaxGraph();
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
                    if (data[i]["libelle"].length > 2){
                        $("#sousFamille").append(
                            "<option value="+ data[i]["idSousFamille"] +">"+ data[i]["libelle"] +"</option>"   
                        );
                    }
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