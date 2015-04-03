<!DOCTYPE html>
<html>
<head>
	<title>%TITLE%</title>
	
</head>
<body>
	<div style="margin:0 auto;">
		<div style="margin:0 auto;width:600px;">
			<pre>%ERROR%</pre>
			<pre>%DATA%</pre>
		</div>
		<br />
		<div style="margin:0 auto;width:600px;border:1px solid #000;">
			<form action="index.php" method="post">
			<table>
				<caption>%TITLE%</caption>
				<tr>
					<td align="right">Name:</td>
					<td align="left"><input type="text" value="%NAME%" size="25" name="name" /></td>
				</tr>
				<tr>
					<td align="right">E-mail:</td>
					<td align="left"><input type="text" value="%MAIL%" size="25" name="email" /></td>
				</tr>
				<tr>
					<td align="right">Subject:</td>
					<td align="left">
						<select size=1 name="subject">
							<option value='default'%DEFAULT%>Select something ...</option>	
							<option value='Item 1'%KEY1%>Item 1</option>	
							<option value='Item 2'%KEY2%>Item 2</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td align="right" valign="top">Message:</td>
					<td align="left"><textarea cols="25" rows="5" name="msg">%MSG%</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"><input type="submit" value="send" name="send" /></td>
				</tr>
			</table>
			</form>
		</div>
	</div>
		
</body>

</html>

