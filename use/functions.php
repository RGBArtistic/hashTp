<?php
    function normalizeUserChar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function verifPost($post, $pattern)
    {
        if(!empty(trim($post)) && preg_match($pattern, $post)) return normalizeUserChar($post);
    }

    function verifMail($mail)
    {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) return normalizeUserChar($mail);
    }

    function bindParamDb($prepare, $string, $value)
    {
        $prepare->bindParam($string, $value) ;
    }

    function actionOnDb($sql, $object, $paramToBind = null, $typeOfQuery = null)
    {
        $prepare = $object->prepare($sql) ;
        if(is_array($paramToBind) && count($paramToBind) >= 1)
        {
            foreach($paramToBind as $key => $value)
            {
                bindParamDb($prepare, $key, $value) ;
            }
            $result = $prepare->execute();
        }
        
        if($typeOfQuery == 'FETCH' || $typeOfQuery == 'fetch')
        {
            $prepare->execute();
            $prepare->setFetchMode(PDO::FETCH_ASSOC) ;
            $result = $prepare->fetchAll() ;
        }
        return $result ;
    }
?>