<?php
/**
 * SeoExt class file
 *
 * @author Ivan Suvorov <ivan@idol-studio.com>
 * @link http://idol-it.com/
 * @copyright Copyright &copy; 2012 Idol-IT
 * @license BSD licence
 */

class SeoExt extends CApplicationComponent
{
    /* SEO param list */
    public $types = array('title','keywords','description');

    public function run($settypes = null,$language = null){
        /* if no param list is set during initialization, then uses default param list */
        if(count($settypes))
        {
            foreach($settypes as $type)
                $this->seotag($type,$language);
        } else{
            foreach($this->types as $type)
                $this->seotag($type,$language);
        }
    }

    /*
    $tag - meta tag type (title, keywords, description)
    $language - language, if exists
    */
    public function seotag($tag, $language = null)
    {
        $urls = $this->getUrls();

        $crt = new CDbCriteria();
        $crt->condition = "url = :param AND is_active = '1'";
        $crt->addCondition("type = '".$tag."'",'AND');

        if($language != null){
            $crt->addCondition("language = '".$language."'",'AND');
        }

        $seoRes = null;
        foreach($urls as $url)
        {
            $crt->params = array(":param"=>$url);
            $seoRes = null;
            $seoRes = YiiSeo::model()->find($crt);
            if(count($seoRes))
                break;
        }

        /* save if there is result */
        if(count($seoRes)){
            $content = $seoRes->content;
            if($seoRes->param != null)
                $content .= $this->getSeoparam($seoRes->param);


            $this->printMeta($tag,$content);
        }
    }

    /* getting url list */
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

    /* printing Meta data */
    private function printMeta($tag,$content)
    {
        if($tag == "title")
            echo "<title>$content</title>";
        else {
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
        } else
            return "";
    }
}
