<?php

namespace Views;

class AirlineModelView extends View {

    public function __construct($data = null)
    {
        if($data) {
            $this->data = $data;
        }
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function render() {
        // Render products
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Brand</th><th>Model</th></tr>";
        foreach ($this->data as $key => $val) {
            echo "<tr>";
            foreach ($val as $attributes) {

                echo "<td>" . $attributes . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

}
