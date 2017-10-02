/*global $*/

function reply_click(clicked_id)
{
    alert(clicked_id);
}

function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
}

$(document).ready(function() {
    $('#maintable').DataTable();
} );

$('#navbar > ul').dropotron({
// OPTIONS HERE
expandMode: 'hover'
});