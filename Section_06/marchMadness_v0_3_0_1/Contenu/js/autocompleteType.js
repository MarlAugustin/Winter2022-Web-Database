$(function() {
    
    //autocomplete
    $("#auto").autocomplete({
        source:"index.php?action=quelsVille",
        minLength:1
    });
});