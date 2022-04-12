<footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://hosterweb.id/">
                            HosterWeb
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                Copyright &copy; 2022, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://hosterweb.id/">HosterWeb</a>
            </div>				
        </div>
    </footer>
</div>
<!-- End Custom template -->
</div>
	<!--   Core JS Files   -->
	<script src="<?=routeTo()?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=routeTo()?>assets/js/core/popper.min.js"></script>
	<script src="<?=routeTo()?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?=routeTo()?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?=routeTo()?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=routeTo()?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?=routeTo()?>assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?=routeTo()?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?=routeTo()?>assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?=routeTo()?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?=routeTo()?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?=routeTo()?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?=routeTo()?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?=routeTo()?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?=routeTo()?>assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?=routeTo()?>assets/js/setting-demo.js"></script>
	<script src="<?=routeTo()?>assets/js/demo.js"></script>
	<script src="https://cdn.tiny.cloud/1/rsb9a1wqmvtlmij61ssaqj3ttq18xdwmyt7jg23sg1ion6kn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
		function example_image_upload_handler (blobInfo, success, failure, progress) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', '<?=routeTo('crud/upload2')?>');

			xhr.upload.onprogress = function (e) {
				progress(e.loaded / e.total * 100);
			};

			xhr.onload = function() {
				var json;

				if (xhr.status === 403) {
					failure('HTTP Error: ' + xhr.status, { remove: true });
				return;
				}

				if (xhr.status < 200 || xhr.status >= 300) {
					failure('HTTP Error: ' + xhr.status);
				return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.location != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.location);
			};

			xhr.onerror = function () {
				failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
	  	};
      tinymce.init({
        selector: '.tinymce',
		images_upload_url: '<?=routeTo('crud/upload')?>',
		document_base_url: '<?=routeTo()?>',
		relative_urls: false,
		remove_script_host: false,
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
    </script>
	<script>
		$('.datatable').dataTable()
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>