		<div id="footer">
			<div class="container">
				<p class="text-muted">
					<small class="copy">&copy; <?php echo date('Y') > 2014 ? date('Y') . '-' : '' ?>2014</small> <a href="https://github.com/earthperson/eshop" target="_blank" class="small"><?php echo CHtml::encode(Yii::app()->name) ?></a> <a href="public-offer.php" class="small">Публичная оферта</a>, <a href="feedback.php" class="small">Обратная связь</a>
					<small class="pull-right">&nbsp;v0.3.2-pl</small><a href="<?php echo Yii::app()->params['VK.group']; ?>" target="_blank" class="pull-right small">Группа ВКонтакте</a><span class="pull-right">,&nbsp;</span><a href="http://dev.earthperson.info" target="_blank" class="pull-right small">Разработка</a>
				</p>
			</div>
		</div>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="blueimp/js/jquery.blueimp-gallery.min.js"></script>
		<script src="blueimp-bootstrap/js/bootstrap-image-gallery.min.js"></script>
		<script type="text/javascript" src="js/default.min.js"></script>
		<script type="text/javascript" src="js/rpc.min.js"></script>
	</body>
</html>
