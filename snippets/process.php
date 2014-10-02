<?php 
require_once '../config/settings.php';
require_once FRAMEWORK_PATH;
Yii::createWebApplication('../config/config.php');
require_once 'helper.php';
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	ini_set('display_errors', 0);
	// Turn off output buffering
	ini_set('output_buffering', 'off');
	// Turn off PHP output compression
	ini_set('zlib.output_compression', false);
	// Implicitly flush the buffer(s)
	ini_set('implicit_flush', true);
	ob_implicit_flush(true);
	// Clear, and turn off output buffering
	// Disable apache output buffering/compression
	if (function_exists('apache_setenv')) {
		apache_setenv('no-gzip', '1');
		apache_setenv('dont-vary', '1');
	}
	
	// Set RPC response headers
	header("Content-Type: application/json");
	header("Content-Encoding: UTF-8");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	if(isset($_POST['action'])) {
		$hash = get_hash_for_sql();
		
		// Promocode
		if($_POST['action'] == 'a') {
			$promocode = trim($_POST['promocode']);
			$response = array('status' => 0);
			if($promocode != '') {
				if(Yii::app()->db->createCommand("UPDATE promocode SET isused = 1 WHERE id = " . Yii::app()->db->quoteValue($promocode))->execute()) {
					Yii::app()->db->createCommand("INSERT INTO promocode_hash (promocode_id, cart_hash) VALUES (" . Yii::app()->db->quoteValue($promocode) . ", {$hash})")->execute();
					$response = array('status' => 1);
				}
				elseif(Yii::app()->db->createCommand("SELECT COUNT(promocode_id) FROM promocode_hash WHERE promocode_id = " . Yii::app()->db->quoteValue($promocode) . " AND cart_hash = {$hash} LIMIT 1")->queryScalar() > 0) {
					$response = array('status' => 1);
				}
			}
		}
		
		// Add to cart
		elseif($_POST['action'] == 'b') {
			$item_id = (int)$_POST['item_id'];
			$size = $_POST['size'];
			$amount = (int)$_POST['amount'];
			$inscription = trim($_POST['inscription']);
			$printpromolink = (int)$_POST['printpromolink'];
			if(!in_array($size, get_size_array())) {
				$response = array('status' => 0, 'reason' => 'size');
			}
			if($amount <= 0) {
				$response = array('status' => 0, 'reason' => 'amount');
			}
			if(empty($response)) {
				$result = Yii::app()->db->createCommand("
			 		INSERT INTO cart (
			 			hash, item_id, size, amount, inscription, printpromolink, created
			 		)
			 		VALUES (
			 			{$hash},
						{$item_id},
			 			" . Yii::app()->db->quoteValue($size) . ",
			 			{$amount},
			 			" . Yii::app()->db->quoteValue($inscription) . ",
			 			{$printpromolink},
			 			" . new CDbExpression('NOW()') . "
			 		)" // ON DUPLICATE KEY UPDATE
				)->execute();
				$response = array(
					'status' => $result,
					'count' => Yii::app()->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar(),
					'sum' => (int)Yii::app()->db->createCommand("SELECT SUM(amount) FROM cart WHERE hash = {$hash}")->queryScalar(),
				);
			}
		}
		
		// Push to cart
		elseif($_POST['action'] == 'c') {
			$item_id = (int)$_POST['item_id'];
			$result = Yii::app()->db->createCommand("
					INSERT INTO cart (hash, item_id, created)
			 		VALUES (
			 			{$hash},
			 			{$item_id},
			 			" . new CDbExpression('NOW()') . "
			 		)" // ON DUPLICATE KEY UPDATE
			)->execute();
			Yii::app()->db->createCommand("UPDATE cart SET amount=amount+1 WHERE id = " . Yii::app()->db->lastInsertID)->execute() . " AND hash = {$hash}";
 			$response = array(
 				'status' => $result,
 				'count' => Yii::app()->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar(),
 				'sum' => (int)Yii::app()->db->createCommand("SELECT SUM(amount) FROM cart WHERE hash = {$hash}")->queryScalar(),
 			);
		}
		
		// Delete from cart
		elseif($_POST['action'] == 'd') {
			$id = (int)$_POST['id'];
			$result = Yii::app()->db->createCommand("DELETE FROM cart WHERE id = {$id} AND hash = {$hash}")->execute();
			$response = array(
				'status' => $result,
				'count' => Yii::app()->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar(),
				'sum' => (int)Yii::app()->db->createCommand("SELECT SUM(amount) FROM cart WHERE hash = {$hash}")->queryScalar(),
				'total' => price_format(Yii::app()->db->createCommand("
					SELECT SUM(price * amount) FROM cart 
						INNER JOIN item ON (cart.item_id = item.id)
					WHERE hash = {$hash}")->queryScalar()),
			);
		}
		
		// Update cart
		elseif($_POST['action'] == 'e') {
			$set = "modified = " . new CDbExpression('NOW()');
			$id = (int)$_POST['id'];
			if(isset($_POST['size']) && in_array($_POST['size'], get_size_array())) {
				$set .= ", size = '{$_POST['size']}' ";
			}
			if(isset($_POST['amount'])) {
				$amount = (int)$_POST['amount'];
				if($amount > 0) {
					$set .= ", amount = {$amount} ";
				}
			}
			if(isset($_POST['printpromolink'])) {
				$set .= (", printpromolink = " . ((int)$_POST['printpromolink'] == 1 ? '1' : '0') . " ");
			}
			$result = Yii::app()->db->createCommand("UPDATE cart SET {$set} WHERE id = {$id} AND hash = {$hash}")->execute();
			$response = array(
				'status' => $result,
				'count' => Yii::app()->db->createCommand("SELECT COUNT(id) FROM cart WHERE hash = {$hash}")->queryScalar(),
				'sum' => (int)Yii::app()->db->createCommand("SELECT SUM(amount) FROM cart WHERE hash = {$hash}")->queryScalar(),
				'priceamount' => price_format(Yii::app()->db->createCommand("
						SELECT price * amount FROM cart
						INNER JOIN item ON (cart.item_id = item.id)
						WHERE cart.id = {$id} AND hash = {$hash}")->queryScalar()),
				'total' => price_format(Yii::app()->db->createCommand("
						SELECT SUM(price * amount) FROM cart
						INNER JOIN item ON (cart.item_id = item.id)
						WHERE hash = {$hash}")->queryScalar()),
			);
		}
		
		elseif($_POST['action'] == 'f') {
			$set = "modified = " . new CDbExpression('NOW()');
			$id = (int)$_POST['id'];
			$inscription = trim($_POST['inscription']);
			$result = Yii::app()->db->createCommand("UPDATE cart SET inscription = " . Yii::app()->db->quoteValue($inscription) . " WHERE id = {$id} AND hash = {$hash}")->execute();
			$response = array(
				'status' => $result
			);
		}
		
		if(!empty($response)) { 
			echo json_encode($response);
		}
	}
}
