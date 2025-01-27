<?php 

class Result {
    private ?array $data;
    private int $status_code; 
    private ?SimpleXMLElement $xml_data; 
 
    public function __construct($data) {
        $this->data = $data;
    }
 
    public function getData(): ?array {
        return $this->data;
    }

    public function getDataXML(): ?SimpleXMLElement {
        return $this->data_xml;
    }
 
    public function printData(): void {
        echo "<result>";


        if (isset($this->data[0]['ID']) && isset($this->data[0]['Details'])) {
            echo "<error>";
            echo "<code>" . htmlspecialchars($this->data[0]['ID']) . "</code>"; 
            echo "<origin>" . htmlspecialchars($this->data[0]['Origin']) . "</origin>"; 
            echo "<details>" . htmlspecialchars($this->data[0]['Details']) . "</details>";  
            echo "<severity>" . htmlspecialchars($this->data[0]['Severity']) . "</severity>"; 

            echo "</error>";
        } else {
            echo "<data>";
            print_r($this->data); 
            echo "</data>";
        }
        echo "</result>";
    }
} 
