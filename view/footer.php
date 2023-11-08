
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view/assets/style.css">
  <title>Document</title>
</head>
<body>

<!-- Footer -->
<div class="footer">
  <h2>Footer</h2>
</div>
  
<script>
function loadDoc($url) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.querySelector("div.row div.side h2").innerHTML = 'About you'
    this.responseText;
  }
  xhttp.open("GET", $url);
  xhttp.send();
}
</script>
</body>
</html>