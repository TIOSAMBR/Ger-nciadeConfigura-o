<?php
// TemperatureConverterTest.php

require 'TemperatureConverter.php';

use PHPUnit\Framework\TestCase;

class TemperatureConverterTest extends TestCase {
    public function testCelsiusToFahrenheit() {
        $converter = new TemperatureConverter();
        $result = $converter->celsiusToFahrenheit(0);
        $this->assertEquals(32, $result);

        $result = $converter->celsiusToFahrenheit(100);
        $this->assertEquals(212, $result);

        $result = $converter->celsiusToFahrenheit(-40);
        $this->assertEquals(-40, $result);
    }
}
?>
