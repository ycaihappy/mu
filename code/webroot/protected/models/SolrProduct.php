<?php



class SolrProduct extends ASolrDocument {

	/**
     * Required for all ASolrDocument sub classes
     * @see ASolrDocument::model()
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    /**
     * @return ASolrConnection the solr connection to use for this model
     */
    public function getSolrConnection() {
        return Yii::app()->solr;
    }
}


?>