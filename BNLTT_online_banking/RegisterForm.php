<!DOCTYPE html>
<html>

<head>
    <title>Account Register Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #bb3636;
            color: #ffffff;
            padding: 20px;
        }

        .container {
            width: 750px;
            margin: auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            text-align: left;
            margin-top: 50px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100px;
            height: auto;
        }

        h2 {
            color: #000000;
            font-size: 30px;
            margin-bottom: 20px;
            font-family: 'Ubuntu', sans-serif;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #000000;
            font-family: 'Ubuntu', sans-serif;
        }

        .bodyy {
            display: inline-block;
            margin-bottom: 2px;
            color: #000000;
            font-family: 'Ubuntu', sans-serif;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #f2f2f2;
            color: #000000;
            border-radius: 5px;
            font-family: 'Ubuntu', sans-serif; 
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #000000;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 16px;
            cursor: pointer;
            border: 1px solid black;
            font-family: 'Ubuntu', sans-serif;
        }

        .button:hover {
            background-color: #e9e9e9;
        }

        
        .form-group .bodyy {
            margin-right: 10px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <img class="logo" src="logo.png" alt="Logo" />
        <h2>Account Register Form</h2>
        <img src="register.png" alt="Register" style="width: 200px; height: auto;" />
        <form name="inpfrm" method="post" action="Register.php">
            <div class="form-group">
                <label class="label">ID type:</label>
                <select name="ID_type" class="input-field">
                    <option value="" disabled selected hidden style="color: gray;">Choose an option</option>
                    <option value="Driver License">Driver License</option>
                    <option value="National ID">National ID</option>
                    <option value="Passport">Passport</option>
                </select>
            </div>
            <div class="form-group">
                <label class="label">ID Number:</label>
                <input type="text" name="ID_number" class="input-field" placeholder="Enter ID number" />
            </div>
            <div class="form-group">
                <label class="label">First Name:</label>
                <input name="Customer_First_Name" type="text" id="Customer_First_Name" class="input-field" size="30" value=""
                    maxlength="30" />
            </div>
            <div class="form-group">
                <label class="label">Last Name:</label>
                <input name="Customer_Last_Name" type="text" id="Customer_Last_Name" class="input-field" size="30" value=""
                    maxlength="30" />
            </div>
            <div class="form-group">
                <label class="label">Date of Birth:</label>
                <input type="date" name="Customer_Date_of_Birth" class="input-field" />
            </div>
            <div class="form-group">
                <label class="label">Sex:</label>
                <label class="bodyy"><input type="radio" name="Customer_Sex" value="Male" />Male</label>
                <label class="bodyy"><input type="radio" name="Customer_Sex" value="Female" />Female</label>
            </div>
            <div class="form-group">
                <label class="label">Address:</label>
                <input type="text" name="street" id="street" class="input-field" placeholder="Street" />
                <input type="text" name="city" id="city" class="input-field" placeholder="City" />
                <input type="text" name="state" id="state" class="input-field" placeholder="State" />
                <input type="text" name="postal_code" id="postal_code" class="input-field" placeholder="Postal Code" />
                <input type="text" name="country" id="country" class="input-field" placeholder="Country" />
            </div>
            <div class="form-group">
                <label class="label">Phone Number:</label>
                <input name="Customer_Phone_Number" type="text" id="Customer_Phone_Number" class="input-field" size="10" value=""
                    maxlength="10" />
            </div>
            <div class="form-group">
                <label class="label">Email:</label>
                <input name="Customer_Email" type="text" id="Customer_Email" class="input-field" size="30" value=""
                    maxlength="30" />
            </div>
            <div class="form-group">
                <label class="label">Account Type:</label>
                <select name="Account_type" class="input-field">
                    <option value="" disabled selected hidden style="color: gray;">Choose an option</option>
                    <option value="Fixed deposit">Fixed deposit</option>
                    <option value="Salary">Salary</option>
                    <option value="Saving">Saving</option>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Branch:</label>
                <select name="Branch_ID" class="input-field">>
                    <option value="" disabled selected hidden style="color: gray;">Select Branch</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="form-group">
                <label class="label ">Password:</label>
                <input type="password" name="password1" class="input-field" placeholder="Enter Password"/>
            </div>
            <div class="form-group">
                <label class="label">Confirm Password:</label>
                <input type="password" name="password2" class="input-field" placeholder="Enter Confirm Password">
            </div>
            <div class="button-container">
                <input type="submit" name="Register" value="Register" class="button" />
            </div>

            <div class="button-container">
      <a href="index.php" class="button">Back</a>
    </div>

        </form>
    </div>
</body>

</html>