<?php
    class Parcel
    {
        private $weight;
        private $length;
        private $width;
        private $height;
        private $distance;

        function __construct($length, $width, $height, $weight, $distance)
        {
            $this->length = $length;
            $this->width = $width;
            $this->height = $height;
            $this->weight = $weight;
            $this->distance = $distance;
        }

        function getVolume()
        {
            return $this->length * $this->width * $this->height;
        }

        function getCost()
        {
          return ($this->weight * $this->distance) / 20;
        }
    }
?>
