<?php

Class ProductController Extends BaseController {

	public function index() {
		$this->registry->template->show ( 'product' );
	}
		
}

?>
