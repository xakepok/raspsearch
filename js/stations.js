'use strict';
var stations = false;

fetch('/index.php?option=com_railway2&task=railway2.stations')
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        stations = data;
    })
    .catch(function(err) {
        console.log('Fetch Error :-S', err)
    });

function searchStation(item) {
    var layer = (item.id === 'searchFrom') ? 'divFrom' : 'divTo';
    var dir = (item.id === 'searchFrom') ? 'fromID' : 'toID';
    if (item.value.length >= 2)
    {
        document.getElementById(layer).style.display="block";
        var res = [];
        for (var i=0; i < stations.length; i++)
        {
            if (stations[i].stationName.toLowerCase().indexOf(item.value.toLowerCase()) > -1)
            {
                var str = "<span class=\"link\" onclick=\"setStation('"+dir+"', '"+stations[i].stationID+"', '"+stations[i].stationName+"')\">"+stations[i].stationName + "</span>";
                res.push(str);
            }
        }
        if (res.length > 0) document.getElementById(layer).innerHTML = res.join('<br>');
    }
    else
    {
        document.getElementById(layer).style.display="none";
    }
}
function setStation(dir, id, station) {
    document.getElementById(dir).value=id;
    document.getElementById('divFrom').style.display="none";
    document.getElementById('divTo').style.display="none";
    var layer = (dir === 'fromID') ? 'searchFrom' : 'searchTo';
    document.getElementById(layer).value=station;
}

function checkSearch() {
    var error = false;
    var fromID = document.getElementById('fromID').value;
    var toID = document.getElementById('toID').value;
    var dat = document.getElementById('date').value;
    if (toID == undefined || toID == '0' || toID == '')
    {
        error = "Не выбрана станция назначения";
    }
    if (fromID == undefined || fromID == '0'  || fromID == '')
    {
        error = "Не выбрана станция отправления";
    }
    if (error != false)
    {
        document.getElementById('errorSearch').innerText=error;
        document.getElementById('errorSearch').style.display="block";
        return false;
    }
    return true;
};