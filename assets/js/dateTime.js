$(document).ready(function () {
    setInterval(ShowTime, 1000);
});

function ShowTime() {
    
    var TheDate = new Date();
    
    var TheHour = TheDate.getHours();
    var TheMinutes = TheDate.getMinutes();
    var TheSeconds = TheDate.getSeconds();
    
    TheSeconds = (TheSeconds < 10) ? "0" + TheSeconds :  TheSeconds;
    
    var TheTime = "Time: " + TheHour + ":" +TheMinutes + ":" + TheSeconds;
    
    $('#TheDate').html(TheTime);     
}

var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleDateString();