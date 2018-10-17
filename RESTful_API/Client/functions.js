$(document).ready(function(){

    //This function CREATES a record
    $(document).on("submit", "#create", function(e){
        e.preventDefault();
        var arrayData = {
            "name": $("form#create input[name=name]").val(),
            "url": $("form#create input[name=url]").val(),
            "theDesc": $("form#create input[name=theDesc]").val()
        };
        var data = JSON.stringify(arrayData);
        $.post("../Service/RESTful.php", data,
            function(request){
                console.log(arrayData);
            });
    });

    //This function UPDATES a record
    $(document).on("submit", "#update", function(e){
        e.preventDefault();
        var arrayData = {
            "id": $("form#update input[name=id]").val(),
            "name": $("form#update input[name=name]").val(),
            "url": $("form#update input[name=url]").val(),
            "theDesc": $("form#update input[name=theDesc]").val()
        };
        var data = JSON.stringify(arrayData);
        console.log(data);
       $.ajax({
            url: '../Service/RESTful.php',
            type: 'PUT',
            data: data,
            success: function(request) {
                console.log(data);
            }
        });
    });


    //This function DELETES a record
    $(document).on("submit", "#delete", function(e){
        e.preventDefault();
        var temp = {"id" : $("form#delete input[name=id]").val()}
        var data = JSON.stringify(temp);
        console.log(data);
        $.ajax({
            url: '../Service/RESTful.php',
            type: 'DELETE',
            data: data,
            success: function(request) {
                console.log(data);
            }
        });
    });


    //This function RETRIEVES a record based on ID
    $(document).on("submit", "#retrieve", function(e){
        e.preventDefault();
        var temp = {"id" : $("form#retrieve input[name=id]").val(), "type" : "GET", "userName" : ""};
        var data = JSON.stringify(temp);
        console.log("The ID to retrieve is " + data);
        $.ajax({
            url: '../Service/RESTful.php',
            type: 'PUT',
            data: data,
            success: function(request) {
                console.log("request was sucessful");
            }
        });
    });



    //This function RETRIEVES a record based on NAME
    $(document).on("submit", "#retrieve2", function(e){
        e.preventDefault();
        var temp = {"userName" : $("form#retrieve2 input[name=userName]").val(), "type" : "GET", "id" : ""};
        var data = JSON.stringify(temp);
        console.log("The name to retrieve is " + data);
        $.ajax({
            url: '../Service/RESTful.php',
            type: 'PUT',
            data: data,
            success: function(request) {
                console.log("request was sucessful");
            }
        });
    });
});


//This function prints the Data stored in the JSON file in the Data folder
function printData(){
    $.getJSON("../Data/data.json", function (data) {
    $.each(data, function (index, value) {

       console.log("The ID of this user is " + value.ID);
       document.getElementById("a1").innerHTML = value.ID;

       console.log("The Date of this user is " + value.theDate);
       document.getElementById("a2").innerHTML = value.theDate;

       console.log("The name of this user is " + value.name);
       document.getElementById("a3").innerHTML = value.name;

       console.log("The URL of this user is " + value.URL);
       document.getElementById("a4").innerHTML = value.URL;

       console.log("The description of this user is " + value.theDesc);
       document.getElementById("a5").innerHTML = value.theDesc;

       });
    });
}
