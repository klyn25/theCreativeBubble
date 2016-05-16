<?php
class Observer {
    public function notify($message) {
        echo "I have received a message from Subject: \r\n";
        var_dump($message); // Just print out any information it may contain: strings, numbers, objects...
        echo "END OF MESSAGE\r\n";
    }
	
	public function update($message) {
        echo "I have received a message from Comment: \r\n";
        var_dump($message); // Just print out any information it may contain: strings, numbers, objects...
        echo "END OF MESSAGE\r\n";
    }
};