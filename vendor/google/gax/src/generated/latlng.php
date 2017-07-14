<?php
// DO NOT EDIT! Generated by Protobuf-PHP protoc plugin 1.0
// Source: google/type/latlng.proto
//   Date: 2016-11-23 22:55:01

namespace google\type {

  class LatLng extends \DrSlump\Protobuf\Message {

    /**  @var float */
    public $latitude = null;
    
    /**  @var float */
    public $longitude = null;
    

    /** @var \Closure[] */
    protected static $__extensions = array();

    public static function descriptor()
    {
      $descriptor = new \DrSlump\Protobuf\Descriptor(__CLASS__, 'google.type.LatLng');

      // OPTIONAL DOUBLE latitude = 1
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 1;
      $f->name      = "latitude";
      $f->type      = \DrSlump\Protobuf::TYPE_DOUBLE;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $descriptor->addField($f);

      // OPTIONAL DOUBLE longitude = 2
      $f = new \DrSlump\Protobuf\Field();
      $f->number    = 2;
      $f->name      = "longitude";
      $f->type      = \DrSlump\Protobuf::TYPE_DOUBLE;
      $f->rule      = \DrSlump\Protobuf::RULE_OPTIONAL;
      $descriptor->addField($f);

      foreach (self::$__extensions as $cb) {
        $descriptor->addField($cb(), true);
      }

      return $descriptor;
    }

    /**
     * Check if <latitude> has a value
     *
     * @return boolean
     */
    public function hasLatitude(){
      return $this->_has(1);
    }
    
    /**
     * Clear <latitude> value
     *
     * @return \google\type\LatLng
     */
    public function clearLatitude(){
      return $this->_clear(1);
    }
    
    /**
     * Get <latitude> value
     *
     * @return float
     */
    public function getLatitude(){
      return $this->_get(1);
    }
    
    /**
     * Set <latitude> value
     *
     * @param float $value
     * @return \google\type\LatLng
     */
    public function setLatitude( $value){
      return $this->_set(1, $value);
    }
    
    /**
     * Check if <longitude> has a value
     *
     * @return boolean
     */
    public function hasLongitude(){
      return $this->_has(2);
    }
    
    /**
     * Clear <longitude> value
     *
     * @return \google\type\LatLng
     */
    public function clearLongitude(){
      return $this->_clear(2);
    }
    
    /**
     * Get <longitude> value
     *
     * @return float
     */
    public function getLongitude(){
      return $this->_get(2);
    }
    
    /**
     * Set <longitude> value
     *
     * @param float $value
     * @return \google\type\LatLng
     */
    public function setLongitude( $value){
      return $this->_set(2, $value);
    }
  }
}

