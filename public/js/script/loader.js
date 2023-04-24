document.onreadystatechange = function() { 
    if (document.readyState !== "complete") { 
        document.querySelector( 
        "body").style.visibility = "hidden"; 
        document.querySelector( 
        ".container-spinner").style.visibility = "visible"; 
    } else { 
        document.querySelector( 
        "body").style.visibility = "visible"; 
        document.querySelector( 
        ".container-spinner").style.display = "none"; 
    } 
};