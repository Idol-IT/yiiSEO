<?php

class SeoExt extends CApplicationComponent
{
    /* список параметром SEO по умолчанию */
    public $types = array('title','keywords','description');

    public function run($settypes = null,$language = null){
        /* проверка на список параметров переданых при инициализации
        если пустой то используем поумолчанию
         */
        if(count($settypes))
        {
            foreach($settypes as $type)
                $this->seotag($type,$language);
        }
        else{
            foreach($this->types as $type)
                $this->seotag($type,$language);
        }

    }

    /*
    $tag - тип мета тега (title, keywords, description и тд.)
    $language - язык, если он есть
    */
    public function seotag($tag, $language = null)
    {
        /* получаем список ссылок по иерархии */
        $urls = $this->getUrls();

        $crt = new CDbCriteria();
        $crt->condition = "url = :param AND is_active = '1'";
        $crt->addCondition("type = '".$tag."'",'AND');

        if($language != null){
            $crt->addCondition("language = '".$language."'",'AND');
        }

        /*
        для каждой из сылок ищем нахождение в БД до тех пор пока не найдено
        */
        $seoRes = null;
        foreach($urls as $url)
        {
            $crt->params = array(":param"=>$url);
            $seoRes = null;
            $seoRes = YiiSeo::model()->find($crt);
            if(count($seoRes))
                break;
        }

        /*
        если есть результат, то сохраняем его
        */
        if(count($seoRes)){
            $content = $seoRes->content;
            if($seoRes->param != null)
            {
                $content .= $this->getSeoparam($seoRes->param);
            }
            /*
            выводим на META
            */
            $this->printMeta($tag,$content);
        }



    }

    private function getUrls()
    {
        $result = null;
        $urls = Yii::app()->request->url;
        $data = explode("/",$urls);
        unset($data[0]);

        while(count($data))
        {
            $_url = "";
            $i = 0;
            foreach($data as $key=>$d)
            {
                $_url .= $i++ ? "/".$d : $d ;
            }

            $result[] = $_url."/*";
            $result[] = $_url;
            unset($data[$key]);

        }
        $result[] = "/*";
        $result[] = "/";

        return $result;
    }

    private function printMeta($tag,$content)
    {
        if($tag == "title")
            echo "<title>$content</title>";
        else{
            echo "<meta name='$tag' content='$content' />";
        }
    }

    private function getSeoparam($param)
    {
        $urls = Yii::app()->request->url;
        $data = explode("/",$urls);
        $id = $data[count($data)-1];

        $param = explode("/",$param);

        if(class_exists($param[0],false)){
            $item = new $param[0];
            $item = $item->findByPk($id);
            if(count($item)){
                return $item[$param[1]];
            }
        }

        else
            return "";

    }
}
