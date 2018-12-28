<script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["registration"]["username"].value;
		if(x==null || x=="")
		{
			alert("Username should be filled out!");
			document.forms["registration"]["username"].focus();
			return false;
		}
		var x=document.forms["registration"]["password"].value;
		if(x==null || x=="")
		{
			alert("Password should be filled out!");
			document.forms["registration"]["password"].focus();
			return false;
		}
		var x=document.forms["registration"]["name"].value;
		if(x==null || x=="")
		{
			alert("Name should be filled out!");
			document.forms["registration"]["name"].focus();
			return false;
		}
		var x=document.forms["registration"]["phone"].value;
		var y=parseFloat(x);
		if(isNaN(y) || x.length<10 || x.length>10)
			{
				alert("Phone should be a ten digit number");
				document.forms["registration"]["phone"].focus();
				return false;
			}
			var x=document.forms["registration"]["email"].value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				alert("Not a valid email");
				document.forms["registration"]["email"].focus();
				return false;
			}
	}
</script>

<div id="regform">
<h1>Registration</h1>
<br />
<form action="bin/register.php" name="registration" onsubmit="return validateForm()" method="post">
        <table width="70%">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="textBox" />*</td>
            </tr> 
                <td>Password</td>
                <td><input type="password" name="password" class="textBox" />*</td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" class="textBoxLong" />*</td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea rows="4" cols="15" name="address"></textarea></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" class="textBox" />*</td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" class="textBox" />*</td>
            </tr>
            <tr>
                <td>NIC</td>
                <td><input type="text" name="NIC" class="textBox" /></td>
            </tr>
            <tr>
                <td colspan="2">
                	<button type="submit">send</button>
                    <button type="reset">clear</button>
                </td>               
            </tr>
            <tr>
            	<td></td>
                <td>* required fields</td>
            </tr>
            
        </table>
       </form>
    </div>