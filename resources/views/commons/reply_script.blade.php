<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$('#Modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')

  var modal = $(this)
  modal.find('.modal-title').text('photoid：' + recipient)
  modal.find('.modal-body input#recipient-name').val(recipient)
})
  </script>  