function myPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text"; // changing element type value
  } else {
    x.type = "password";
  }
}