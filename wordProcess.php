<?php
    header("Content-Type:text/html; charset=utf-8");
    $type = $_POST[type];
	$flag = false;
	
	$xmldoc = new DOMDocument();
	$xmldoc->load("words.xml");
	if ($type=="search")
	{
	    $word = $_POST[en];
		
		if (!$word)
		{
		    echo "请填写要查询的单词!<br/>";
			echo "<a href='index.php' >返回继续</a>	";
			exit();
		}
		$words = $xmldoc->getElementsByTagName("word");
		
		
		for ($i = 0; $i < $words->length; $i++)
		{
		    $search_word = $_POST[en];
		    $word = $words->item($i);
		    $word_en = $word->getElementsByTagName("en")->item(0)->nodeValue;
			if ($word_en==$search_word)
			{
			    $flag = true;
			    echo $search_word.":".$word->getElementsByTagName("cn")->item(0)->nodeValue."<br/>";
			}		
		}
		if (!$flag)
		{
		    echo "没有查询到！<br/>";
		}
		echo "<a href='index.php' >返回继续</a>	";
	}
	else if ($type=="add")
	{
	    
		$add_en = $_POST[en];
		$add_cn = $_POST[cn];
		if (!($add_en&&$add_cn))
		{
     		echo "请输入要添加的英文单词和对应的中文!<br/>";
			echo "<a href='index.php' >返回继续</a>	";
			exit();
		}
		
		
		$root = $xmldoc->getElementsByTagName("words")->item(0);
		$word = $xmldoc->createElement("word");
		
		$word_en = $xmldoc->createElement("en");
		$word_en->nodeValue="$add_en";
		$word->appendChild($word_en);
		
        $word_cn = $xmldoc->createElement("cn");        
		$word_cn->nodeValue="$add_cn";		
		$word->appendChild($word_cn);
		
		
		$root->appendChild($word);		
		$result = $xmldoc->save("words.xml");
		
		if ($result)
		{
		    echo "添加成功!<br/>";
		}
		else
		    echo "添加失败!";
		echo "<a href='index.php' >返回继续</a>	";
	}
	else if ($type=="delete")
	{
	    $del_en = $_POST[en];
		if (!$del_en)
		{
     		echo "请输入要删除的英文单词!<br/>";
			echo "<a href='index.php' >返回继续</a>	";
			exit();
		}
		$flag = false;
		
		$node_all = $xmldoc->getElementsByTagName("en");			
		
		for ($i=0; $i < $node_all->length; $i++)
		{
		    $node = $node_all->item($i);
			$word_en = $node->nodeValue;
		    if ($word_en=="$del_en")
			{
			    $node_all->item($i)->parentNode->parentNode->removeChild($node_all->item($i)->parentNode);
				$flag = true;
			}
		}
		if ($flag)
        {
            echo "删除成功!<br/>";  
        }
        else
            echo "删除失败!<br/>";
			
	    $xmldoc->save("words.xml");
		
		echo "<a href='index.php' >返回继续</a>	";
	}
	else if ($type=="update")
	{
	    $up_en = $_POST[en];
		$up_cn = $_POST[cn];
		$flag = false;
		if (!($up_en&&$up_cn))
		{
     		echo "请输入要更新的英文单词和对应的中文!<br/>";
			echo "<a href='index.php' >返回继续</a>	";
			exit();
		} 
        $node_all = $xmldoc->getElementsByTagName("en");		
        foreach($node_all as $val)
        {
		    
            if ($val->nodeValue==$up_en) 
            {
			
			    $val->parentNode->getElementsByTagName("cn")->item(0)->nodeValue=$up_cn;
			
				$flag = true;				
            }           			
        }
			
        if ($flag)
        {
            echo "更新成功!<br/>";  
        }
        else
            echo "添加失败!<br/>";
			
	    $xmldoc->save("words.xml");
		
		echo "<a href='index.php' >返回继续</a>	";
	}


?>