<?php
class Subject {
    private $observers = array(); // We will store observers here
 
    public function attach($observer) {
        if(!in_array($observer, $this->observers)) { // Make sure we don't add an observer twice
            $this->observers[] = $observer; // Add the observer
			//var_dump($observer);
            return true;
        } else {
            return false; // Observer was not added
        }
    }
 
    public function detach($observer) {
        if(!in_array($observer, $this->observers)) { // Make sure the observer is registered
            return false;
        } else {
            $key = array_search($observer, $this->observers); // Find observer's key
            unset($this->observers[$key]); // Remove the observer
            $this->observers = array_values($this->observers); // Reindex the observer array, as unset leaves a gap
            return true;
        }
    }
 
    public function notify($message) {
        foreach($this->observers as $observer) { // Notify each observer
            $observer->notify($message); // Dispatch the message to each observer
        }
    }
};