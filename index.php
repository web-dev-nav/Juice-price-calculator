<html>
<head>
    <meta charset="utf-8" />
    <title>Datepicker example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="fluid-container bg-dark"> 
    <h3 class="text-center text-white">Juice Price Calculator</h3>
    <form id="form" method ="post" class="mt-5 form-group">
        <div class="d-flex justify-content-center">
              <div class="p-2 bd-highlight"><input id="rate" width="276" placeholder="Rate" class="form-control" required/></div>
              <div class="p-2 bd-highlight"><input id="datepicker" width="276" placeholder="order date" class="form-control" required/></div>
              <div class="p-2 bd-highlight"><input id="amount" width="276" placeholder="Total amount" class="form-control" required/></div>
              <div class="p-2 bd-highlight"><button type="submit" class="btn btn-success">submit</button></div>
        </div>
        <div class = "text-center text-white">
          <span id="response" class="text-center"></span>
        </div>
        
         
   </form>
  
    </div>
 
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
        
        
        $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            
            var rate = $("#rate").val();
            var date = $("#datepicker").val();
            var amt = $("#amount").val();
          
            // alert(date);
            
            $.ajax({
                type: "POST",
                url: 'function.php',
                data: {'rate': rate, 'date': date,'amt': amt,  'call':1},
                success: function(response)
                {
                    //var jsonData = JSON.parse(response);
                    
                    $('#response').html('output: ' + response);
     
                  
               }
                   });
             });
        });
    </script>
</body>
</html>