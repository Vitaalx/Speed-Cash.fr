function printStock(){

    const queryPrintStock = new XMLHttpRequest();
    queryPrintStock.onreadystatechange = function(){
        if (queryPrintStock.readyState === 4) {
            const stockbox = document.getElementById("stocks");
            stockbox.innerHTML += queryPrintStock.responseText;
        }
    }

    queryPrintStock.open("POST", "./phps/printStock.php");
    queryPrintStock.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    queryPrintStock.send();
}

function printLed(){

    const product = document.getElementById("product");
    const prodVal= product.value;

    const queryPrintLes = new XMLHttpRequest();
    let arrayData = Array();
    queryPrintLes.onreadystatechange = function(){
        if (queryPrintLes.readyState === 4) {
            const lesbox = document.getElementById("lesBoxResults");
            lesbox.innerHTML += queryPrintLes.responseText;
            let dataForecast = JSON.parse(queryPrintLes.responseText);
            for(let i = 0; i < dataForecast.length; ++i){
                arrayData[i] = parseInt(dataForecast[i].sales, 10);
            }
            const arrbox = document.getElementById("arrayBoxResults");
            arrbox.innerHTML += arrayData;

            let bestAlpha = findBestAlpha(arrayData, dataForecast.length+3);

            function led(data, alpha, horizon){
                let lissage = Object();
                //on initialise la premiere valeur du lissage avec la moyenne des deux premiers
                //éléments de la série
                lissage.premier = Array();
                lissage.second = Array();
        
                lissage.premier[0] = data[0];
                lissage.premier[1] = data[1];
        
                for(let i = 2; i < data.length; ++i)
                {
                    lissage.premier[i] = alpha*data[i] + (1-alpha)*lissage.premier[i-1];
                }
        
                lissage.second[0] = lissage.premier[0];
                for(let i = 1; i < data.length; ++i)
                {
                    lissage.second[i] = alpha*lissage.premier[i] + (1-alpha)*lissage.second[i-1];
                }
        
                lissage.a = Array();
                lissage.b = Array();
                for(let i = 1; i < data.length; ++i)
                {
                    lissage.a[i] = (alpha/(1-alpha))*(lissage.premier[i] - lissage.second[i]);
                    lissage.b[i] = 2*lissage.premier[i] - lissage.second[i];
                }
        
                let previsions = Array();
                previsions[0] = null;
                previsions[1] = null;
                for(let i = 2; i <= data.length; ++i)
                {
                    previsions[i] = lissage.a[i-1] + lissage.b[i-1];
                }
        
                for(let i = data.length +1; i < data.length + horizon; ++i)
                {
                    previsions[i] = previsions[i-1] + lissage.a[data.length-1];
                }
        
                //console.log(previsions);

            let name="container-speed";

            let div = document.createElement('div');
            div.setAttribute("style", "width: 580px; height: 400px; float: left");
            div.setAttribute("id", name);
            document.body.appendChild(div);

            let gaugeOptions = {
            
                title: {
                    text: 'Ventes mensuelles',
                    x: -20 //center
                },
                xAxis: {
                    categories: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin',
                        'Juil', 'Aout', 'Sept', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb']
                },
                yAxis: {
                    title: {
                        text: 'CA (k€)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: 'k€'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'Réalisé',
                    data: data
                }, {
                    name: 'Prévisions',
                    data: previsions
                }]
            };
            let chart = Highcharts.chart(name, Highcharts.merge(gaugeOptions, {}));
                return previsions,dataForecast;
            }

            console.log(led(arrayData, bestAlpha, 10));
        }
    }
    //console.log(prodVal);
    queryPrintLes.open("POST", "./phps/printLes.php");
    queryPrintLes.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    queryPrintLes.send(`nameprod=${prodVal}`);

}

//Lissage exponnentiel simple

function les(data, alpha){
    var forecast = Array();
    forecast[0] = null;
    //on initialise la premiere valeur du lissage avec la moyenne des deux premiers
    forecast[1] = 0.5*(data[0] + data[1]);
    for(var i = 2; i <= data.length; ++i)
    {
        forecast[i] = alpha*(data[i-1] - forecast[i-1]) + forecast[i-1];
        //console.log(forecast[i]);
        //forecast[i] = alpha * erreur(t-1) + prédiction(t-1)
    }
    return forecast;
}

//Lissage exponentiel double
/*
function led(data, alpha, horizon)
{
	var lissage = Object();
	//on initialise la premiere valeur du lissage avec la moyenne des deux premiers
	//éléments de la série
	lissage.premier = Array();
	lissage.second = Array();

	lissage.premier[0] = data[0];
	lissage.premier[1] = data[1];

	for(var i = 2; i < data.length; ++i)
	{
		lissage.premier[i] = alpha*data[i] + (1-alpha)*lissage.premier[i-1];
	}

	lissage.second[0] = lissage.premier[0];
	for(var i = 1; i < data.length; ++i)
	{
		lissage.second[i] = alpha*lissage.premier[i] + (1-alpha)*lissage.second[i-1];
	}

	lissage.a = Array();
	lissage.b = Array();
	for(var i = 1; i < data.length; ++i)
	{
		lissage.a[i] = (alpha/(1-alpha))*(lissage.premier[i] - lissage.second[i]);
		lissage.b[i] = 2*lissage.premier[i] - lissage.second[i];
	}

	var previsions = Array();
	previsions[0] = null;
	previsions[1] = null;
	for(var i = 2; i <= data.length; ++i)
	{
		previsions[i] = lissage.a[i-1] + lissage.b[i-1];
	}

	for(var i = data.length +1; i < data.length + horizon; ++i)
	{
		previsions[i] = previsions[i-1] + lissage.a[data.length-1];
	}

	return previsions;
}

*/

//Trouver la meilleur valeur de alpha

function computeMeanSquaredError(data, forecast)
{
	var error = 0.0;
	for(var i = 1; i < data.length; ++i)
	{
		error += Math.pow(data[i] - forecast[i], 2);
	}
	return 1/(data.length-1)*error;
}
function findBestAlpha(data, nbIter)
{
	var incr = 1/nbIter;
	var bestAlpha = 0.0;
	var bestError = -1;
	var alpha = bestAlpha;

	while(alpha < 1)
	{
		var forecast = les(data, alpha);
		var error = computeMeanSquaredError(data, forecast);
		if(error < bestError || bestError == -1)
		{
			bestAlpha = alpha;
			bestError = error;
		}
		alpha += incr;
	}
	return bestAlpha;
}