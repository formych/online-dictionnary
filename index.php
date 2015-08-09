<html>
    <head>
	    <meta http-euiv="Content-Type" type="text/html" charset="utf-8" />
		<title>英汉词典</title>
	</head>
	<body>
	    <h1>查询</h1>
		<form action="wordProcess.php" method="post" >
		    英文:<input type="text" name="en"/>  <input type="submit" value="查询" />
			<input type="hidden" name="type" value="search" />
		</form>
		
		<h1>添加</h1>
		<form action="wordProcess.php" method="post">
		    英文:<input type="text" name="en" /> <br/>
			中文:<input type="text" name="cn" /> <br/>
			<input type="submit" value="提交" />
            <input type="hidden" name="type" value="add" />			
		    
		</form>
		
		<h1>删除</h1>
		<form action="wordProcess.php" method="post">
		    英文:<input type="text" name="en" /> <br/>			
			<input type="submit" value="提交" />
            <input type="hidden" name="type" value="delete" />			
		    
		</form>
		
		<h1>更新</h1>
		<form action="wordProcess.php" method="post">
		    英文:<input type="text" name="en" /> <br/>
			中文:<input type="text" name="cn" /> <br/>
			<input type="submit" value="提交" />
            <input type="hidden" name="type" value="update" />			
		    
		</form>
		
	</body>


</html>