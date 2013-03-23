<?php

class page_reset extends Page {
	function init(){
		parent::init();

		
		$submit_url = "http://xavoc.com";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $submit_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_POST, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
			$result = curl_exec($ch);
			curl_close($ch);
			$this->add('Text')->set($result);
	}

	function query($q) {
        $this->api->db->dsql()->expr($q)->execute();
    }
}