/**
 * This js script is a script that shows pre loader while loading web page.
 */
 
//show pre loader
document.querySelector("#loader-container").style.display = 'block';
document.querySelector("#loader").style.display = 'block';

document.onreadystatechange = function() {
	//show pre loader while web page is not ready
    if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("#loader").style.visibility = "visible";
    } 
	//hide pre loader while while web page is ready
	else {
        document.querySelector("#loader").style.display = "none";
        document.querySelector("#loader-container").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
}
