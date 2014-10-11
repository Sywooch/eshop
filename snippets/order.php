<?php
$order_id = 0;
Yii::app()->db->createCommand("DELETE FROM cart WHERE hash = {$hash}")->execute();
