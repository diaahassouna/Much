<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--===============================================================================================-->
    <!--Link for jQuery solution to display Output Data is from https://idratherbewriting.com/learnapidoc/docapis_access_json_values.html -->
<!--===============================================================================================-->
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
<!--===============================================================================================-->
    <title>Much</title>
    
</head>
<body>
    
    <div class="body">
      <div class="Form"><br>
        <form action="{{ route('math') }}" method="POST">
          @csrf
          <h2 style="text-align: center;color: floralwhite;">Trade Your Item With Your Work Days</h2><br>
          <label for="item_price" class="text">Your Item Price: </label><br>
          <input type="number" id="item_price" name="item_price" class="display"><br><br>
          <label for="salary" class="text">Salary: </label><br>
          <input type="number" id="salary" name="salary" class="display"><br><br>
          <label for="standard_hours" class="text">Daily Hours: </label><br>
          <input type="number" id="standard_hours" name="standard_hours" class="display"><br><br> 
          <label for="standard_days" class="text">Work Days Per Week: </label><br>
          <input type="number" id="standard_days" name="standard_days" class="display"><br><br> 
          <label for="netflix_fee" class="text">NetFlix Subscription Fee: </label><br>
          <input type="number" id="netflix_fee" name="netflix_fee" class="display"><br><br> 
          <input type="submit" value="Submit" class="result"><br> 
        </form><br><br>
      </div>
    </div>

    <div class="Form">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
          var settings = {
            "async": true,
            "crossDomain": true,
            "url": "data.json",
            "method": "GET"
          }

          $.ajax(settings).done(function (response) {
            console.log(response);

            var days_needed = response.days_needed;
            var netflix_alert = response.netflix_alert;
            $("#DaysNeeded").append(days_needed);
            $("#NetflixAlert").append(netflix_alert);

          });
      </script>
      <h2><br>
        <div id="DaysNeeded" style="text-align: center;color: floralwhite;">Work Days Needed: </div><br>
        <div id="NetflixAlert" style="text-align: center;color: floralwhite;"> </div>
      </h2>
    </div>    
</body>
</html>