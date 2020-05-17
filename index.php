<?php

?>
<!DOCTYPE html>
<html lang="tr">


<head>
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>Api Testleri</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css?v4">



</head>
<body style="background-color: white;" class="">

	<div id="app">
          <div class="col-sm-12">
    <div class="card">

        <div class="card-header">
			<div class="text-right">
    <a href="talep.html" target='_blank' class="btn btn-primary btn-sm">Talep Ekle</a>
		</div>
            <h5>Gönderdiğim Destek Talepleri</h5>

        </div>
        <div class="card-body table-border-style">
          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Talep Adı</th>
                        <th>Talep İçeriği</th>
                        <th>Durumu</th>
                    </tr>
                </thead>
                <tbody>
					<tr
						v-for="todo in tickets"
    					:key="todo.id">
						<td>{{ todo.ticket_title }}</td>
						<td>{{ todo.ticket_message }}</td>
						<td>{{ todo.ticket_confirmation }}</td>
					</tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
</div>
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script>
  let vm = new Vue({
    el: '#app',
    data: {
      ticket_title: '',
      ticket_message: '',
	  id: '1',
	  tickets:[],
    },
	  mounted() {
		  this.getir();
	  },
    methods: {
		getir()
		{
		  let url = 'https://destek.uzem.tv/katilimciDestekTaleplerim/'+this.id+'/'+'lmsselcuk' /* İstek yapılacak url */
		  let donen = axios.get(url)
		.then(donen => {
			  this.tickets = donen.data;
		  })
		  .catch(hata => { /* Eğer bir sorun varsa '.catch' ile oluşan hatayı yakalıyoruz */
			  console.error(hata);
		  });
		}
	}

  });
	</script>


</body>

</html>
