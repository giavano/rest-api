<!-- <div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" class="form-control" id="mobile">
                            
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname">
                            
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname">
                            
                        </div>
                        <div class="form-group">
                            <label for="dob">DOB</label>
                            <input type="text" name="dob" class="form-control" id="dob">
                           
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" class="form-control" id="gender">
                            
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        
                        </div> 
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <title>Registration Form</title>
</head>
<body>
    <?php
        // if (isset($_POST['id']) && $_POST['id']!="") 
        // {
        //     $id = $_POST['id'];
        //     $url = "http://localhost:8080/mitrais/api/".$id; 
        //     $client = curl_init($url);
        //     curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        //     $response = curl_exec($client);     
        //     $result = json_decode($response);

        // echo "<table>";
        // echo "<tr><td>ID:</td><td>$result->id</td></tr>";
        // echo "<tr><td>firstname:</td><td>$result->firstname</td></tr>";
        // echo "<tr><td>lastname:</td><td>$result->lastname</td></tr>";
        // echo "<tr><td>dob:</td><td>$result->dob</td></tr>";
        // echo "<tr><td>gender:</td><td>$result->gender</td></tr>";
        // echo "<tr><td>email:</td><td>$result->email</td></tr>";
        // echo "</table>";
    ?>

  <form action="" method="POST" id="formregistration">
        <div class="container" >

            <h1>Registration</h1>
            <hr>

            <input type="tel"   placeholder="Mobile Number (62)xxx" name="mobile"    required pattern="62[0-9]{9,13}">
            <input type="text"  placeholder="First Name"            name="firstname" required>
            <input type="text"  placeholder="Last Name"             name="lastname"  required>

            <p>Date of Birth</p>

            <div>
                <select id="year"  style="height:30px; width:80px"></select>
                <select id="month" style="height:30px; width:80px"></select>
                <select id="day"   style="height:30px; width:80px"></select>
            </div>

            <p> </p>
            
            <label class="radio-inline">
            <input type="radio" name="gender" value="M" checked>Male
            </label>
            <label class="radio-inline">
            <input type="radio" name="gender" value="F">Female
            </label>

            <p></p>
            
            <input type="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >

            <hr>
            <button type="submit" class="registerbtn" name="submit" onClick="disable()">Register</button>
        </div>
    
        <div class="container signin" id="footer">
           
        </div>
    </form>

    
    <script>
       function disable() {
         document.getElementById("mobile").disabled = true;
         document.getElementById("firstname").disabled = true;
         document.getElementById("lastname").disabled = true;
         document.getElementById("year").disabled = true;
         document.getElementById("month").disabled = true;
         document.getElementById("day").disabled = true;
         document.getElementById("gender").disabled = true;
         document.getElementById("email").disabled = true;
         document.getElementById("submit").disabled = true;

        var button = document.createElement('button');
        button.innerHTML = 'Login';
        button.onclick = function(){
           return false;
        };
        document.getElementById("footer").appendChild(button);
         }

        $(document).ready(function() {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
        var qntYears    = 30;
        var selectYear  = $("#year");
        var selectMonth = $("#month");
        var selectDay   = $("#day");
        var currentYear = new Date().getFullYear();

        for (var y = 0; y < qntYears; y++){
            let date              = new Date(currentYear);
            var yearElem          = document.createElement("option");
            yearElem.value        = currentYear 
            yearElem.textContent  = currentYear;
            selectYear.append(yearElem);
            currentYear--;
        } 

        for (var m = 0; m < 12; m++){
            let monthNum          = new Date(2018, m).getMonth()
            let month             = monthNames[monthNum];
            var monthElem         = document.createElement("option");
            monthElem.value       = monthNum; 
            monthElem.textContent = month;
            selectMonth.append(monthElem);
            }

        var d     = new Date();
        var month = d.getMonth();
        var year  = d.getFullYear();
        var day   = d.getDate();

        selectYear.val(year); 
        selectYear.on("change", AdjustDays);  
        selectMonth.val(month);    
        selectMonth.on("change", AdjustDays);

        AdjustDays();
        
        selectDay.val(day)

        function AdjustDays(){
            var year  = selectYear.val();
            var month = parseInt(selectMonth.val()) + 1;
            selectDay.empty();
            
            //get the last day, so the number of days in that month
            var days  = new Date(year, month, 0).getDate(); 
            
            //lets create the days of that month
            for (var d = 1; d <= days; d++){
            var dayElem         = document.createElement("option");
            dayElem.value       = d; 
            dayElem.textContent = d;
            selectDay.append(dayElem);
            }
        }    
        });
    </script>

</body>
</html>
