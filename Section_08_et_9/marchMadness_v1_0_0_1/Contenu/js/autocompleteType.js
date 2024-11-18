$(function() {
    
    //autocomplete
    $("#auto").autocomplete({
        source:"index.php?controleur=Type&action=index",
        minLength:1
    });
});